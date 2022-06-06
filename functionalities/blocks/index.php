<?php
function loadBLock( string $block, array $options = [], $is_returned = false ) {
    $block_folder = THEME_URL . '/.resources/blocks/' . $block;

    if( $is_returned ) ob_start();

    if( !file_exists( $block_folder . '/index.php' )) {
        echo "<span style='color: lightcoral'>Block '$block' not found.</span>";
        if( !$is_returned ) return null;
    }include $block_folder . '/index.php';

    if( $is_returned ) return ob_get_clean();
}