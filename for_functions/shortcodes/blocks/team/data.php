<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
if( $wstd_gd_cl ):
    $arg = array(
        'post_type' => 'team',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'sort_index',
        'order' => 'desc',
    );

    $data = $wstd_gd_cl->getElementsData(
        $arg,
        array('photography', 'person_position'),
        false,
        'investments'
    );
endif;