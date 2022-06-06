<?

add_filter( 'lzb/block_render/allow_wrapper', function( $allow_wrapper, $attributes, $context ) {
    return false;
}, 10, 3 );
