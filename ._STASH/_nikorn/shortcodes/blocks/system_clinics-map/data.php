<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

if( $wstd_gd_cl ):

    $arg = array(
        'post_type' => 'clinicks',
        'posts_per_page' => 10,
        'orderby' => 'meta_value',
        'meta_key' => 'sort_index',
        'order' => 'desc',
    );

    if( !is_archive() && is_array($wstd_gd_cl->page_data['fields']['relation_doctor_to_clinicks']) && !empty($wstd_gd_cl->page_data['fields']['relation_doctor_to_clinicks'])) {
        foreach( $wstd_gd_cl->page_data['fields']['relation_doctor_to_clinicks'] as $c ) {
            $arg['post__in'][] = $c->ID;
        }
    }



    $data = $wstd_gd_cl->getElementsData(
        $arg,
        array('c_telephones', 'c_address', 'c_work-time', 'c_coordinats'),
        false,
        'clinics_type',
        'clinicsForMapSort'
    );

endif;