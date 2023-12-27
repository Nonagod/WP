<?php
require_once __DIR__ .'/../wp-load.php';

/*
yookassa - http уведомления
backurl - возврат пользователя на страницу из шлюза (успех, ошибка)
 * */
$_type = filter_input( INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

if( $_type === 'backurl' && $_COOKIE['last_order']['order_id'] ) {
    $_order_data = get_post( $_COOKIE['last_order']['order_id'], ARRAY_A  ) ?: array();
    $_order_data['_status'] = get_post_meta( $_COOKIE['last_order']['order_id'], 'status', true );

    if(
        !$_order_data['ID']
        || ( $_order_data['ID'] && $_order_data['_status'] == 1 )
    ) setcookie("last_order[order_id]", null, -1, '/');

    require_once __DIR__ .'/result.page.php';
}
elseif( $_type === 'yookassa' ) require_once __DIR__ .'/handlers/yookassa.php';
else {
    header('Location: https://' .$_SERVER['SERVER_NAME'] , true, 302);
    exit();
}