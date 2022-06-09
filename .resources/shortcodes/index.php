<?php

remove_shortcode('load_block');
add_shortcode('load_block', function( $attr, $content, $tag ) {
    return loadBLock( $attr['block'], $attr, true );
});
