<?php
/*
 После добавления любого правила требуется сохранить стр /wp-admin/options-permalink.php
 * */
function initPaginationForPage( $page_name ) {
    add_action('init', function( ) use ( $page_name ) {
        add_rewrite_rule( $page_name . '/page/?([0-9]{1,})/?$', 'index.php?pagename='. $page_name .'&paged=$matches[1]', 'top');
    });
}

// === initialization ===

// initPaginationForPage( 'restaurants' );