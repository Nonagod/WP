<?php
if( !function_exists('get_header') )  require_once __DIR__ .'/../wp-load.php'; // todo перенести файл в отдельную папку и закрыть к нему доступ, удалить подключение wp-load (нужно для открытия файла по прямой ссылке в браузере, чтобы не выдавалась ошибка)
/**
 * @var $_order_data - массив данных заказа
 */

$title = $text = '';

if( $_order_data['ID'] ) {
    $title = 'Заказ №'. $_order_data['ID'] .' создан';
    $text = '';

    if( $_order_data['_status'] == 0 ) {
        $title .= ', ожидает оплату';
        $text = 'Как только оплата пройдет, статус заказа изменится.';
    }elseif( $_order_data['_status'] == 1 ) {
        $title .= ', оплачен';
        $text = 'Спасибо за покупку!';
    }
}else {
    $title = 'Заказ не найден';
}
?>
<?php get_header();?>

<h1><?=$title?></h1>
<p><?=$text?></p>

<?get_footer(); ?>