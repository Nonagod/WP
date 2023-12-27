<?php
use YooKassa\Client;

/**
 * @var Nonagod\UserActions\Manager $this
 */

const PAYMENT_STATUS_PROCESSING = 0;
const PAYMENT_STATUS_PAID = 1;

if( !function_exists( 'formatCartForYooKassa' )) { function formatCartForYooKassa( int $denomination, int $vat_code ) {
    $denomination = number_format($denomination, 2, '.', '');
    return array(
        'items' => array(
            array(
                'description' => "Подарочный сертификат",
                'amount' => array(
                    'value' => $denomination,
                    'currency' => 'RUB'
                ),
                'vat_code' => $vat_code,
                'quantity' => 1,
            )
        ),
        '_summary' => $denomination,
    );
}}


/*
INPUT

fields[client][name]
fields[client][phone]
fields[client][email]


fields[certificate][type]
fields[certificate][from] (от кого)
fields[certificate][to] (от кому)
fields[certificate][incognito] (анонимно)
fields[certificate][text] (поздравления)
 * */
if( !function_exists( 'get_fields' )) throw new \Exception( 'Невозможно получить настройки, плагин отсутствует' );

$SETTINGS = get_fields( 'ts_ecommerce' );

if(
    !$SETTINGS['YOOKASSA_SHOP_ID']
    || !$SETTINGS['YOOKASSA_SECRET_KEY']
    || !$SETTINGS['YOOKASSA_TAX_SYSTEM']
    || !$SETTINGS['YOOKASSA_VAT_CODE']
) throw new \Exception( 'Настройки системы оплаты заполнены не верно или пустые.' );

try {

    $FIELDS = filter_input( INPUT_POST, 'fields', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY );

    if( !$FIELDS['client']['name'] || !$FIELDS['client']['phone'] || !$FIELDS['client']['email'] ) throw new \Exception( 'Неправильно заполнены данные пользователя!' );
    if( !$FIELDS['certificate']['denomination'] || $FIELDS['certificate']['denomination'] < 5000 ) throw new \Exception( 'Некорректный наминал сертификата!' );

    /* CHECK YOOCASSA SETTINGS */


    $order_id = wp_insert_post(array (
        'post_type' => 'orders',
        'post_title' => "Заказ от ". date( 'm-d-Y' ) .", на сумму {$FIELDS['certificate']['denomination']}",
        'post_content' => json_encode( $FIELDS ),
        'post_status' => 'publish',//'private',
        'comment_status' => 'closed',
        'ping_status' => 'closed',
    ));

    $payment_link = null;
    if( $order_id ) {
        $idempotence_key = uniqid( $order_id .'.', true );
        $Client = new Client();
        $cart = formatCartForYooKassa( (int)$FIELDS['certificate']['denomination'], $SETTINGS['YOOKASSA_VAT_CODE'] );

        $Client->setAuth( $SETTINGS['YOOKASSA_SHOP_ID'], $SETTINGS['YOOKASSA_SECRET_KEY'] );

        $payment = $Client->createPayment(
            array(
                'amount' => array(
                    'value' => $cart['_summary'],
                    'currency' => 'RUB'
                ),
                'receipt' => array(

                    'customer' => array(
                        'email' => $FIELDS['client']['email'],
//                        'phone' => $fields['phone'], // todo сделать приведение телефона к формату ITU-T E.164
                    ),
                    'tax_system_code' => $SETTINGS['YOOKASSA_TAX_SYSTEM'],
                    'items' => $cart['items'],
                ),

                'description' => ' Заказ №'. $order_id,
                'metadata' => array(
                    'order_id' => $order_id,
                ),

                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => 'https://'. $_SERVER['SERVER_NAME'] .'/payment_result?type=backurl',
                ),
                'capture' => false,
                'payment_method_data' => array(
                    'type' => 'bank_card',
                ),
            ),
            $idempotence_key
        );

        if( $payment_link = $payment->getConfirmation()->getConfirmationUrl( )) {
            add_post_meta($order_id, 'payment_id', $payment->getId(), true);
            add_post_meta($order_id, 'payment_link', $payment_link, true);
            add_post_meta($order_id, 'status', 0, true);

            setcookie("last_order[order_id]", $order_id, time() + 3600, '/');
        }else wp_delete_post( $order_id );
    }

    if( !$payment_link ) throw new \Exception( 'Заказ не создан, попробуйте позже. Если проблема сохраниться - обратитесь к администратору сайта.' );

    $this->succeed( $payment_link );
}catch( \Exception $exception ) {
    $this->failed("SCRIPT_ERROR", $exception->getMessage( ));
}