<?php
/*turn on - wp thumbnails*/
add_theme_support( 'post-thumbnails' );

function getThumbnail( $post_id ) {
    $data = null;
    $attachment_id = get_post_meta($post_id, '_thumbnail_id');
    if( $attachment_id ) {
        $attachment_id = $attachment_id[0];
        $data = get_post($attachment_id);
    }
    return ($data) ? $data : null;
}