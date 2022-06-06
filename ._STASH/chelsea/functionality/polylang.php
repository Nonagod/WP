<?php
define('CURRENT_LANG', pll_current_language('slug'));

function prepareLinkPll( $link ) {
    $default_lang = pll_default_language('slug');
    return ( CURRENT_LANG !== $default_lang ) ? '/' . CURRENT_LANG . $link : $link;
}

function langMultiAction($function, $options) {
    if( !$options ) $options = array();
    $active_lang = CURRENT_LANG;
    $langs = pll_languages_list();

    if( $active_lang ) {
        $function($active_lang, ...$options);
    }else {
        foreach( $langs as $lang ) {
            $function($lang, ...$options);
        }
    }
}

pll_register_string( 'theme', 'form_text_required-field-empty', 'Форма бронирования', false );
pll_register_string( 'theme', 'form_text_policy', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_phone', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_your-name', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_call-you', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_comment', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_time', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_label_guest-numbers', 'Форма бронирования', true );
pll_register_string( 'theme', 'form_title', 'Форма бронирования', true );

pll_register_string( 'theme', 'read', 'Кнопки', false );
pll_register_string( 'theme', 'more', 'Кнопки', false );
pll_register_string( 'theme', 'btn_order', 'Кнопки', false );
pll_register_string( 'theme', 'btn_start-video', 'Кнопки', false );

pll_register_string( 'theme', 'link_all-menu', 'Ссылки', false );
pll_register_string( 'theme', 'link_all-articles', 'Ссылки', false );
pll_register_string( 'theme', 'link_all-services', 'Ссылки', false );
pll_register_string( 'theme', 'link_all-events', 'Ссылки', false );
pll_register_string( 'theme', 'link_all-news', 'Ссылки', false );

pll_register_string( 'theme', 'st_of-mp_waiting-you', 'Статические блоки', false );
pll_register_string( 'theme', 'st_of-mp_schedule', 'Статические блоки', false );
pll_register_string( 'theme', 'st_of-mp_opening', 'Статические блоки', false );
pll_register_string( 'theme', 'st_of-mp_closing', 'Статические блоки', false );
pll_register_string( 'theme', 'st_of-mp_where-look', 'Статические блоки', false );

pll_register_string( 'theme', 'st_advantages-title_kitchen', 'Статические блоки', false );
pll_register_string( 'theme', 'st_advantages-title_whisky', 'Статические блоки', false );
pll_register_string( 'theme', 'st_advantages-title_beer', 'Статические блоки', false );
pll_register_string( 'theme', 'st_tripadvisor-certificat_text', 'Статические блоки', true );

pll_register_string( 'theme', 'title_menu-popup_nutritional', 'Заголовки', false );
pll_register_string( 'theme', 'title_menu-popup_structure', 'Заголовки', false );
pll_register_string( 'theme', 'title_news-stocks', 'Заголовки', false );
pll_register_string( 'theme', 'title_journal', 'Заголовки', false );
pll_register_string( 'theme', 'title_services', 'Заголовки', false );
pll_register_string( 'theme', 'title_events', 'Заголовки', false );
pll_register_string( 'theme', 'Гастропаб Челси', 'Заголовки', false );
pll_register_string( 'theme', 'title_menu-hits', 'Заголовки', false );
pll_register_string( 'theme', 'title_questions', 'Заголовки', false );

pll_register_string( 'theme', 'Контакты', 'Заголовки', false );
pll_register_string( 'theme', 'Меню', 'Заголовки', false );
pll_register_string( 'theme', 'Услуги', 'Заголовки', false );
pll_register_string( 'theme', 'О нас', 'Заголовки', false );

/*FORMS*/

//SUCCESS POPUP
pll_register_string( 'theme', 'forms__success-text', 'Окно успешно отправленой формы', true );

//ERROR POPUP
pll_register_string( 'theme', 'forms__fail-text', 'Окно не отправленной формы', true );

/*FORMS*/
