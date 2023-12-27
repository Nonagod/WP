<?php
use \YooKassa\Model\Notification\NotificationSucceeded;
use \YooKassa\Model\Notification\NotificationWaitingForCapture;
use \YooKassa\Model\NotificationEventType;
use \YooKassa\Client;

if( $_post_raw = file_get_contents( 'php://input' )) {
    try {
        $_payment_data = json_decode($_post_raw, true);
        $SETTINGS = get_fields( 'ts_ecommerce' );
        $Client = new Client();


        $Notification = ($_payment_data['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded( $_payment_data )
            : new NotificationWaitingForCapture( $_payment_data );

        $Payment = $Notification->getObject();
        $_meta = $Payment->metadata->toArray(); // $_meta['order_id']


        if(
            !$SETTINGS['YOOKASSA_SHOP_ID']
            || !$SETTINGS['YOOKASSA_SECRET_KEY']
        ) throw new \Exception( 'Настройки системы оплаты заполнены не верно или пустые.' );


        $Client->setAuth( $SETTINGS['YOOKASSA_SHOP_ID'], $SETTINGS['YOOKASSA_SECRET_KEY'] );
        $Client->capturePayment(
            array(
                'amount' => $Payment->amount,
            ),
            $Payment->id,
            uniqid('', true)
        );


        if( $_payment_data['event'] === NotificationEventType::PAYMENT_SUCCEEDED ) update_post_meta( $_meta['order_id'], 'status', 1 );
    }catch (\Exception $e) {
        // не выдает ошибку на отсутствующий класс,  NotificationEventType был в другом пространстве, ошибку не выдавал (не было проверки)
        file_put_contents( __DIR__ . '/../../../.logs/payment_result_errors.log', 'YooKassa: ' . $e->getMessage() .PHP_EOL, FILE_APPEND );
    }
}