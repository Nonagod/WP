<?php
add_action( 'init', function() {
    if( function_exists( 'acf_add_options_page' ) ) {
        $theme_options_page = acf_add_options_page(array(
            'page_title'    => 'Настройки темы',
            'menu_title'    => 'Настройки темы',
            'menu_slug'     => 'theme-settings',
            'capability'    => 'edit_posts',
            'redirect'  => false,
        ));

        acf_add_options_sub_page(array(
            'page_title'    => "Контакты",
            'menu_title'    => "Контакты",
            'menu_slug'     => 'ts_contacts',
            'parent_slug'   => $theme_options_page['menu_slug'],
            'capability'    => 'edit_posts',
            'post_id' => 'ts_contacts',
            'redirect'  => false,
        ));

        /* Для языковых версий - множим страницы под каждый язык
         langMultiAction(function( $lang ) use ($parent){
                acf_add_options_sub_page(array(
                    'page_title'    => "Контакты ($lang)",
                    'menu_title'    => "Контакты ($lang)",
                    'menu_slug'     => 'ts_contacts-' . $lang,
                    'parent_slug'   => $parent['menu_slug'],
                    'capability'    => 'edit_posts',
                    'post_id' => 'ts_contacts-' . $lang,
                    'redirect'  => false,
                ));

                acf_add_options_sub_page(array(
                    'page_title'    => "Информационные окна ($lang)",
                    'menu_title'    => "Информационные окна ($lang)",
                    'menu_slug'     => 'ts_info_modal-' . $lang,
                    'parent_slug'   => $parent['menu_slug'],
                    'capability'    => 'edit_posts',
                    'post_id' => 'ts_info_modal-' . $lang,
                    'redirect'  => false,
                ));

            }, null);*/

    }
});



if( function_exists('get_fields') ) {
    $_tmp = get_fields( 'theme-settings' );
    $_tmp['contacts'] = get_fields( 'ts_contacts' );
    // $_tmp['contacts'] = get_fields( 'ts_contacts-' . CURRENT_LANG ); // для активного языка

    define('THEME_OPTIONS', $_tmp);
    unset($_tmp);
}