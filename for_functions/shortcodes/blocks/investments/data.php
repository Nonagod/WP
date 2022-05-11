<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
if( $wstd_gd_cl ):
    $arg = array(
        'post_type' => 'investments',
        'posts_per_page' => -1,
    );

    if( $attr['except'] )
        $arg['post__not_in'] = array($attr['except']);

    $data = $wstd_gd_cl->getElementsData(
        $arg,
        array('sub_title'),
        false,
        'investments'
    );
endif;