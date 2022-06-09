<?php
require_once 'WSTDGetData.php';
require_once 'shortcodes.php';

// actions
add_action( 'wp', function() {
    global $ContentClass;
    $ContentClass = new WSTDGetData( get_the_ID( ));

    define('PAGE_TARGET_OBJECT_DATA', $ContentClass->page_data);
});
