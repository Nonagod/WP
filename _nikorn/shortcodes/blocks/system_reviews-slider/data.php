<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

if( $wstd_gd_cl ) {

    $arg =  array(
        'post_type' => 'reviews',
        'posts_per_page' => 9, // -1
    );

    if( $attr['all-comments'] != "Y" ) {
        $arg['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key' => 'relation_doctor',
                'value' => $wstd_gd_cl->page_data['ID']
            )
        );
    }

    $data = $wstd_gd_cl->getElementsData(
        $arg,
        array('r_video-link')
    );
}
