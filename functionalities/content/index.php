<?php
require_once 'WSTDGetData.php';
require_once 'shortcodes.php';
require_once 'pagination.php';


// SUPPORTS
// add_theme_support( 'post-thumbnails' );

// ACTIONS

add_action( 'wp', function() {
    global $ContentClass;
    $ContentClass = new WSTDGetData( get_the_ID( ));

    define('PAGE_TARGET_OBJECT_DATA', $ContentClass->page_data);
});


// FILTERS

// turn off Gutenberg
add_filter( 'use_block_editor_for_post_type', function( $use_block_editor, $post_type ){
    if( $post_type === 'post_type' ) return false;

    return $use_block_editor;
}, 10, 2 );
// add_filter('use_block_editor_for_post', '__return_false'); // for all posts
