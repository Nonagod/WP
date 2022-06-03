<?php

/*add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);
function my_pre_get_posts( $query ) {
    if( is_admin() ) return;
    if( !$query->is_main_query() ) return;

    if( is_archive() ) {
        if( $query->get('post_type') === 'journal' ) {
            if( $val = filter_input(INPUT_POST, 'journal_tax', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ) {
                $tax_query = $query->get('tax_query');
                if( is_array($tax_query) ) {
                    $tax_query['relation'] = ( $tax_query['relation'] ) ? $tax_query['relation'] : 'OR';
                }else $tax_query = [];

                $tax_query[] = array(
                    'taxonomy' => 'journal_tax',
                    'field'    => 'slug',
                    'terms'    => $val
                );

                $query->set('tax_query', $tax_query);
            }
        }
    }
}*/


add_action('use_block_editor_for_post_type', 'disableGutenbergByPostType', 150, 2);
function disableGutenbergByPostType( $use_gutenberg, $post_type ) {
    if ($post_type === 'menu') return false;
    if ($post_type === 'reviews') return false;
    if ($post_type === 'questions') return false;
    return $use_gutenberg;
}

/*add_action( 'template_redirect', function() {
    if ( preg_match( '#^/wp-json/(.*)#', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( get_option( 'siteurl' ), 301 );
        die();
    }
} );

if( !is_admin() ){

    add_filter( 'rest_pre_dispatch', function( $result, $rest_server, $request ){

        // $request->get_headers()

        // возможно, ошибка аутентификации уже установлена
        //        if ( empty( $result ) && ! current_user_can('edit_others_posts') ){
        //            return new WP_Error( 'rest_forbidden', 'Your capability is low.', [ 'status' => 401 ] );
        //        }

        return WP_Error( 'rest_forbidden', 'Your capability is low.', [ 'status' => 302 ] );
    }, 10, 3 );

    // Отключаем сам REST API
    add_filter( 'rest_enabled', '__return_false' );

    // Отключаем фильтры REST API
    remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
    remove_action( 'wp_head',                    'rest_output_link_wp_head', 10 );
    remove_action( 'template_redirect',          'rest_output_link_header', 11 );

    remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
    remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
    remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

    // Отключаем события REST API
    remove_action( 'init',          'rest_api_init' );
    remove_action( 'rest_api_init', 'rest_api_default_filters', 10 );
    remove_action( 'parse_request', 'rest_api_loaded' );

    // Отключаем Embeds связанные с REST API
    remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
    remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10 );

    // oembed scripts
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js'         );

}


add_action( "admin_post_gess", "test", 10, 3 );
add_action( "admin_post_nopriv_gess", "test", 10, 3 );

function test() {
    echo 321;
}

function add_query_vars_filter( $vars ){
    $vars[] = "wstd_ajax";
    $vars[] = "menu_tax";
    return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );*/
