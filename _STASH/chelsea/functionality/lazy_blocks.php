<?

function disableWrapperForAllBlocks( $allow_wrapper, $attributes, $context ) {
    return false;
}
add_filter( 'lzb/block_render/allow_wrapper', 'disableWrapperForAllBlocks', 10, 3 );
