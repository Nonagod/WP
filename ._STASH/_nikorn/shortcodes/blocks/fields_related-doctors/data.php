<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
global $posts;
if( $wstd_gd_cl ):
    if( $wstd_gd_cl->page_data['fields']['relation_doctor_to_clinicks'] && !is_archive() ) {
        $data['posts'] = $wstd_gd_cl->parseElementObjects($wstd_gd_cl->page_data['fields']['relation_doctor_to_clinicks'], array('type', 'relation_stocks_to_doctor'), false);
    }elseif( $wstd_gd_cl->page_data['fields']['relation_stocks_to_doctor'] && !is_archive() ) {
        $data['posts'] = $wstd_gd_cl->parseElementObjects($wstd_gd_cl->page_data['fields']['relation_stocks_to_doctor'], array('type', 'relation_stocks_to_doctor'), false);
    }elseif( $wstd_gd_cl->page_data['fields']['services_related'] && !is_archive() ) {
        $data['posts'] = $wstd_gd_cl->parseElementObjects($wstd_gd_cl->page_data['fields']['services_related'], array('type', 'relation_stocks_to_doctor'), false);
    }elseif( $attr['specialization'] ) {

        $data = $wstd_gd_cl->getElementsData(
            array(
                "post_type" => "doctors",
                "posts_per_page" => -1,
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'doctors_tax',
                        'field'    => 'slug',
                        'terms'    => array( $attr['specialization'] ),
                    )
                )
            ),
            array('type', 'relation_stocks_to_doctor'),
            false
        );
    }elseif( $posts ) {
        $data['posts'] = $wstd_gd_cl->parseElementObjects($posts, array('type', 'relation_doctor_to_clinicks', 'relation_stocks_to_doctor'), false);
    }else {
        $data = false;
    }
endif;