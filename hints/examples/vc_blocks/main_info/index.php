<?php

vc_map(array(
    'name' => 'Первый экран - информация',
    'base' => 'main_info',
    'class' => 'main_info',
    'icon' => 'icon-wpb-raw-html',
    'show_settings_on_create' => false,
    'admin_enqueue_js' => array(get_template_directory_uri() . '/WSTD/blocks/ASSETS/admin.js'),
    'admin_enqueue_css' => array(get_template_directory_uri() . '/WSTD/blocks/ASSETS/admin.css'),
    'category' => 'WSTD blocks',
    'description' => 'Расчитан на пол экрана',
    'params' => array(
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Заголовок',
            'param_name' => 'title',
            'value' => 'Челси гастропаб',
            'description' => 'h2',
        ),
        array(
            'type' => 'textarea',
            'heading' => 'Текст под заголовком',
            'param_name' => 'undertitle_text',
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Время работы',
            'param_name' => 'work_time',
            'value' => 'Круглосуточно',
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Адрес',
            'param_name' => 'address',
            'value' => 'Малый Гнездниковский пер., д. 12/27, стр 2/3',
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Метро',
            'param_name' => 'metro',
            'value' => 'Пушкинская (252 м), Тверская (267 м), Чеховская (357 м)',
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Instagram',
            'param_name' => 'social_instagram',
            'value' => 'https://www.instagram.com/',
            'group' => 'Соц. сети'
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'VK',
            'param_name' => 'social_vk',
            'value' => 'https://vk.com/chelseagastropub',
            'group' => 'Соц. сети'
        ),
        array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Facebook',
            'param_name' => 'social_facebook',
            'value' => 'https://ru-ru.facebook.com/',
            'group' => 'Соц. сети'
        ),
	    array(
            'type' => 'textfield',
            'holder' => 'b',
            'heading' => 'Telegram',
            'param_name' => 'social_telegram',
            'value' => 'https://t.me/chelseagastropub',
            'group' => 'Соц. сети'
        ),
    ),
    'custom_markup' => '<div class="vc_custom-element-container"><h2>{{{ params.title }}}</h2><ul class="vc_custom-element-container__params"><li class="vc_custom-element-container__params-item">{{{ params.work_time }}}</li><li class="vc_custom-element-container__params-item">{{{ params.address }}}</li></ul></div>',
    'js_view' => 'VcCustomElementView',//VcRowView VcColumnView
));

//manager class
include_once __DIR__ . '/class.php';

//<div class="vc_custom-element-container">
//    <h2>{{{ params.title }}}</h2>
//    <ul class="vc_custom-element-container__params">
//        <li class="vc_custom-element-container__params-item">{{{ params.work_time }}}</li>
//        <li class="vc_custom-element-container__params-item">{{{ params.address }}}</li>
//    </ul>
//</div>

