
<?ob_start();
if( class_exists('WSTDGetData') ) {
    global $wstd_gd_cl;
    $wstd_gd_cl = new WSTDGetData(get_the_ID());
}?>

<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <?/*print title*/?>
        <title><? wp_title(); ?></title>
        <?/*place for WP hooks*/?>
        <?php wp_head(); ?>
    </head>
    <body>