<?php

vc_map(array(
    'name' => 'Страница меню',
    'base' => 'menu_page',
    'class' => 'menu_page',
    'icon' => 'icon-wpb-raw-html',
    'show_settings_on_create' => false,
//    'admin_enqueue_js' => array(get_template_directory_uri() . '/blocks/ASSETS/admin.js'),
//    'admin_enqueue_css' => array(get_template_directory_uri() . '/blocks/ASSETS/admin.css'),
    'category' => 'WSTD blocks',
//    'description' => 'Расчитан на пол экрана',
    'params' => array(

    ),
    'custom_markup' => '<div class="vc_custom-element-container"><h2>Страница меню</h2></div>',
//    'js_view' => 'VcCustomElementView',//VcRowView VcColumnView
));

//manager class
include_once __DIR__ . '/class.php';


