<?php

/*include files*/
require_once THEME_DIR . 'for_functions/WSTDBreadcrumbs.php';
require_once THEME_DIR . 'for_functions/WSTDGetData.php';
require_once THEME_DIR . 'for_functions/WSTDMenu.php';
/*include files*/



/*LOAD BLOCKS FUNCTIONALITY*/
remove_shortcode('load_block');
add_shortcode('load_block', 'loadBlock');
function loadBlock($attr, $content, $tag)
{
    global $wstd_gd_cl;
    $output = false;

    $data_path = THEME_DIR . 'shortcodes/blocks/' . $attr['block'] . '/data.php';
    $view_path = THEME_DIR . 'shortcodes/blocks/' . $attr['block'] . '/view.php';

    ob_start();
    if (file_exists($data_path))
        include $data_path;

    if (file_exists($view_path))
        include $view_path;

    $output = ob_get_clean();

    return $output;
}

function true_add_mce_button()
{
    // user can't edit post or pages?
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }

    // TinyMCE is enable in a user settings?
    if ('true' == get_user_option('rich_editing')) {
        add_filter('mce_external_plugins', 'addButtonsDataFileLink');
        add_filter('mce_buttons', 'registerButton');
    }
}

add_action('init', 'true_add_mce_button');
function addButtonsDataFileLink($plugin_array)
{
    $plugin_array['wstd_btn'] = THEME_URL . '/shortcodes/tinymce_wstd_btn.js'; // wstd_btn - is id
    return $plugin_array;
}

function registerButton($buttons)
{
    array_push($buttons, 'wstd_btn'); // wstd_btn - is id
    return $buttons;
}

/*LOAD BLOCKS FUNCTIONALITY*/
