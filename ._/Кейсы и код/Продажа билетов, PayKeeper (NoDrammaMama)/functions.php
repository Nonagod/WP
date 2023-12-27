<?php


/*INIT*/
$WRequest = new \Webster\Request();
$PayKeeper = new \Webster\ECommerce\PayKeeper( array(
    "user" => "site",
    "password" => "fHu8KUZ7",
    "address_server" => "nodramamama.server.paykeeper.ru"
) );

try{
    $wstd_ajax = $WRequest->filtering('wstd_ajax');
    $LOG = "";

    if( $wstd_ajax ) {

        if( $wstd_ajax === "new_payment" ) {
            $event_id = (int)$WRequest->filtering('event');
            if( $event_id ) {
                $event_data = (array)(new WP_Query('p=' . $event_id))->posts[0];
                if( $event_data ) {
                    $event_data['fileds'] = get_fields($event_data['ID']);

                    $quantity = (int)$WRequest->filtering('quantity');
                    $event_price = (int)$event_data['fileds']['price'];
                    if( $event_data['fileds']['price'] && $event_data['fileds']['is_can_buy'] && $event_data['fileds']['is_active'] && $quantity ) {
                        $user_data = getUserData();

                        $order_data = array(
                            "pay_amount" => $event_price * $quantity,
                            "clientid" => $user_data['name'],
                            "client_email" => $user_data['email'],
//                            "service_name" => $event_data['post_title'],
                            "service_name" => ";PKC|".json_encode(array(array(
                                    'name' => $event_data['post_title'],
                                    'price' => $event_price,
                                    'quantity' => $quantity,
                                    'sum' => $event_price * $quantity,
                                    'tax' => 'none',
                                )))."|",
                            "client_phone" => $user_data['phone']
                        );

                        $order_name = md5(serialize($order_data));
                        $order_id = wp_insert_post(array (
                            'post_type' => 'orders',
                            'post_title' => $order_name,
                            'post_content' => 'order',//var_export($order_data, true),
                            'post_status' => 'publish',//'private',
                            'comment_status' => 'closed',
                            'ping_status' => 'closed',
                        ));

                        if( !$order_id ) throw new \Exception('Ошибка создания заказа.');

                        add_post_meta($order_id, 'date', date('Y-m-d H:i:s'), true);
                        add_post_meta($order_id, 'order_data_serialize', base64_encode(serialize($order_data)), true);
                        add_post_meta($order_id, 'status', 0, true);

                        $order_data['orderid'] = $order_id;
                        $link = $PayKeeper->getReferenceToPayment($order_data);

                        add_post_meta($order_id, 'paykeeper_link', $link, true);

                        if( $link ) {
                            echo json_encode( array(
                                "status" => true,
                                "result" => $link
                            ));
                            die();
                        }else throw new \Exception('Ошибка оплаты.');
                    }else throw new \Exception('Ошибка в данных события.');
                }
            }
        }

        if( $wstd_ajax ==="payment_result" ) {
            $res = $PayKeeper->confirmPayment( '7_FtBfPa5vc)hxeE_X', $WRequest);

//            file_put_contents(__DIR__ . '/log.txt', var_export($_POST, true) . PHP_EOL . '------------' . PHP_EOL, FILE_APPEND);
//            file_put_contents(__DIR__ . '/log.txt', var_export($res, true) . PHP_EOL . '==============' . PHP_EOL . PHP_EOL, FILE_APPEND);

            if( stristr($res, 'NO') === FALSE ) {
                $order_id = (int)$WRequest->filtering('orderid');

                $query = new WP_Query('p=' . $order_id .'&post_type=orders');
                $post_data = (array) $query->posts[0];

                $order_data = unserialize(base64_decode( get_post_meta( $post_data['ID'], 'order_data_serialize', true ) ));

                $LOG .= PHP_EOL. 'Order data: ' . var_export($order_data, true);
                $LOG .= PHP_EOL. 'Order data: ' . var_export($post_data, true);

                $order_data['service_name'] = str_replace(array( ';PKC|', '|'), '', $order_data['service_name']);
                $order_data['service_name'] = json_decode($order_data['service_name'], true);

                $status = get_post_meta( $post_data['ID'], 'status', true );

                if( $order_data && $status !== '' && (int)$status === 0 && ( $order_id === $post_data['ID'] )) {
                    update_post_meta( $order_id, 'status', 1 );

                    $mail_params = array(
                        'order_id' => array( 'title'=> 'Номер заказа', 'value' => $post_data['ID']),
                        'name' => array( 'title'=> 'Клиент', 'value' => $order_data['clientid']),
                        'phone' => array( 'title'=> 'Телефон для связи', 'value' => $order_data['client_phone']),
                        'email' => array( 'title'=> 'Почта для связи', 'value' => $order_data['client_email']),
                        'event' => array( 'title'=> 'Событие', 'value' => var_export($order_data['service_name'], true)),
                        'event_name' => array( 'title'=> 'Событие', 'value' => $order_data['service_name'][0]['name']),
                        'price' => array( 'title'=> 'Стоимость', 'value' => $order_data['pay_amount']),
                    );

                    $mail = new Webster\Marketing\Mail(array(
                            'mails' => array('test-mail@websterstd.com', 'hello@nodramamama.cafe'),
                            'theme' => 'NoDramaMama.cafe | бронирование мероприятия',
                            'template' => 'default'
                        ),
                        $mail_params
                    );

                    sendTGNotice( '-950541337', array_combine( array_column( $mail_params, 'title' ), array_column( $mail_params, 'value' )));

                    $LOG .= PHP_EOL. 'MAILS ';
                    $LOG .= PHP_EOL. 'Mail to cafe: ' . var_export($mail->submit(), true);

                    $mail->setSettings(array(
                        'mails' => array($order_data['client_email']),
                        'theme' => 'NoDramaMama.cafe | бронирование мероприятия - #event_name#',
                        'template' => 'success_consultation'
                    ));

                    $LOG .= PHP_EOL. 'Mail to client: ' . var_export($mail->submit(), true);

                }else {
                    $res = null;
                }
            }
//            file_put_contents(__DIR__. '/orders_log.txt', $LOG, FILE_APPEND);
            echo $res;
            die();
        }

    }

}catch( \Exception $exception ) {
    echo json_encode( array(
        "status" => false,
        "result" => $exception->getMessage()
    ));
//    echo $exception->getMessage();
    die();
}

function getUserData() {
    global $WRequest;

    if( !$name = $WRequest->filtering('name') ) throw new \Exception('Укажите ваше имя.');
    if( !$phone = $WRequest->filtering('phone') ) throw new \Exception('Укажите ваш номер телефона.');
    if( !$email = $WRequest->filtering('email') ) throw new \Exception('Укажите адрес вашей электронной почты.');

    return array(
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
    );
}