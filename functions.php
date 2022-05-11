<?php
/*Global constants*/
define( 'THEME_URL', get_template_directory_uri() . '/' );
define( 'THEME_DIR', get_template_directory() . '/' );
/*Global constants*/

/*configuring CMS*/
//a support menu adding to theme
add_theme_support('menus');
//turn off Guthenberg editor
add_filter('use_block_editor_for_post', '__return_false');
/*configuring CMS*/

/*Include custom functionality*/
if( file_exists('_functions/index.php') )
    require_once '_functions/index.php';
/*Include custom functionality*/

/*Adding other functions*/
/**
 * Print an data with pretty view.
 * @param $d - data which must be printed
 */
function _p($d, $force = false) {
    if( is_user_logged_in() || $force )
        ?><pre><? print_r($d); ?></pre><?
}
/*Adding other functions*/