<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
if( $wstd_gd_cl ):
    $arg = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'post_date'
    );

    $data = $wstd_gd_cl->getElementsData(
        $arg,
        array('preview'),
        false,
        'investments'
    );
endif;