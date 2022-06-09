<?php
if( file_exists( THEME_DIR . '/.resources/shortcodes/index.php' )) {
    require_once THEME_DIR . '/.resources/shortcodes/index.php'; // add shortcodes

    // Add button to mce w list of blocks
    add_action('init', function() {
        if (!current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' )) return;

        if ('true' == get_user_option('rich_editing')) {
            add_filter('mce_buttons', function( $buttons ) {
                array_push($buttons, 'WebsterSTD_shortcodes');
                return $buttons;
            });
            add_filter('mce_external_plugins', function( $plugin_array ) {
                $plugin_array['WebsterSTD_shortcodes'] = THEME_DIR . '/.resources/shortcodes/tinymce_btn.js'; // wstd_btn - is id
                return $plugin_array;
            });
        }
    });
}