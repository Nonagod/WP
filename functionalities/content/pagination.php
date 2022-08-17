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

// === functions ===
function printPagination( $number_of_pages, $active_page_number, $link_additional_classes = '', $link_format = 'page/%s' ) {
    if( $number_of_pages > 1 ) {
        ?><div class="pagination">
            <?for($i = 1; $i <= $number_of_pages; $i++):?>
                <a href="<?printf( $link_format, $i );?>" class="<?= $i === $active_page_number ? 'active' : ''?><?=' '.$link_additional_classes?>"></a>
            <?endfor;?>
        </div><?
    }
}