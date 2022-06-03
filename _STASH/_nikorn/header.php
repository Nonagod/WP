<?
ob_start();
global $wstd_gd_cl;
$wstd_gd_cl = new WSTDGetData( get_the_ID() );
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Запрет распознования номера телефона -->
    <meta name="format-detection" content="telephone=no">
    <meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

    <!-- Заголовок страницы -->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    <link rel="shortcut icon" href="<?=THEME_URL?>/favicon.ico">
    <link rel="stylesheet" href="<?=THEME_URL?>css/main.min.css">
    <link rel="stylesheet" href="<?=THEME_URL?>css/develop.css">
    <link rel="stylesheet" href="<?=THEME_URL?>css/mod.main.css">

    <!-- Обучение старых версий IE тегам html5 -->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <!-- Custom Browsers Color End -->

    <!-- custom route start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=THEME_URL?>css/route.css">
    <!-- custom route end -->

    <!-- substrate-appeal start-->
    <link rel="stylesheet" href="<?=THEME_URL?>css/substrate-appeal.css">
    <!-- substrate-appeal end -->

    <?php wp_head(); ?>

    <!-- Обучение старых версий IE тегам html5 -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    
    <!-- Facebook Pixel Code --><script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js');fbq('init', '256274781829943');fbq('track', 'PageView');</script><noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=256274781829943&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->

    <meta name="google-site-verification" content="-iBBL66obiD6qKpQ4IUAOU6LWF38tgxJ3L6B7VQ-NdI" />
    <meta name="yandex-verification" content="4a685d3255445385" />

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34629495 = new Ya.Metrika({ id:34629495, 	clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/34629495" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121202954-1"></script>
	<script>
 	window.dataLayer = window.dataLayer || [];
  	function gtag(){dataLayer.push(arguments);}
  	gtag('js', new Date());

  	gtag('config', 'UA-121202954-1');
	</script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<48632913-c3ca-4238-9529-f4ccaa75b795>&lang=ru_RU" type="text/javascript"></script>

    <?if( !stristr($_SERVER['REQUEST_URI'], '/blog/') ): ?>
        <script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>
	<?endif;?>
</head>

<body class="jsBody">
	
	<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '08be806800481b31c8dcf886176a0142');
</script>
	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '913493472902487');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=913493472902487&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!--
<div class="header__banner" style="width: 100%;">
			<a href="https://reabilitaciya-korona.ru/?utm_source=stomatology&utm_medium=stomatology&utm_campaign=stomatology" style="display: flex;justify-content: center; align-items: center;" target="_blank">
			<img src="https://nikor-n.ru/wp-content/uploads/2021/02/banner_1.png" alt="" style="object-fit: cover; width: 100%; max-width: 1440px;"> 
			</a>
</div>
-->
<header class="header">
    <div class="header__wrapper">
        <noindex>
            <div class="header__row header__row_top">
                <a href="https://nikormed.ru/" class="link header__link" data-name="header__row_top_theme-1" target="_blank">Никор-мед Зеленоград</a>
                <a href="https://andreevka.nikormed.ru/" class="link header__link" data-name="header__row_top_theme-1" target="_blank">Никор-мед Андреевка</a>
                <a href="https://nikor-n.ru/" class="link header__link header__link_active header__link_nolink">Сеть стоматологических клиник</a>
                <a href="https://nikor-salon.ru/" class="link header__link" data-name="header__row_top_theme-2" target="_blank">Салон красоты</a>
                <a href="https://nikolsky.rest/" class="link header__link" data-name="header__row_top_theme-4" target="_blank">Ресторан Nikol'sky</a>
            </div>
        </noindex>

        <?$menu_items = wp_get_nav_menu_items('site_main_menu');
        $args = array(
            "services" => array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'orderby' => 'meta_value',
                'meta_key' => 'sort_index',
                'order' => 'desc',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service',
                        'field' => 'id',
                        'terms' => array(3,4)
                    )
                )
            )
        );

        if( $menu_items ):?>
            <div class="header__row header__row_main">
                <a href="/" class="logo header__logo">
                    <img src="<?=THEME_URL?>img/logo/logo.svg" alt="Стоматология Никор в Зеленограде" title="Стоматология Никор в Зеленограде" class="img-responsive">
                </a>

                <button class="mobile-menu-button"><span></span></button>


                <?new WSTDMenu( $menu_items, $args );?>


                <div class="header__contacts">
                    <a href="tel:+74992724858" class="link header__tel callibri_phone">+7 (499) 272 48 58</a>
                </div>
                <button class="button jsBtnOrder header__btn">Записаться</button>

            </div>
        <?endif;?>

    </div>
	
</header>

<main>
<!--    --><?php //if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
    <?if( class_exists('WSTDBreadcrumbs') ) new WSTDBreadcrumbs(); ?>
