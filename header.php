
<?ob_start();
if( class_exists('WSTDGetData') ) {
    global $wstd_gd_cl;
    $wstd_gd_cl = new WSTDGetData(get_the_ID());
}?>

<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title><? wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body class="<?=$GLOBALS['theme']['body_class'] ?: ''?>">
        <?if( class_exists( 'WSTDBreadcrumbs' ) ) new WSTDBreadcrumbs(); ?>