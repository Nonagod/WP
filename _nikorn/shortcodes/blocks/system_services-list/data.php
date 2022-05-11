<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
if( $wstd_gd_cl ):
    $data = $wstd_gd_cl->getElementsData(
        array(
            "post_type" => "services",
            "posts_per_page" => -1,
            'orderby' => 'meta_value',
            'meta_key' => 'sort_index',
            'order' => 'desc',
        ),
        array('parent_relation', 's_preview_image'),
        false,
        'service',
        'servicesTreeSortWTax'
    );

    $data['clinics'] = $wstd_gd_cl->getElementsData(
        array(
            "post_type" => "clinicks",
            "posts_per_page" => -1,
        ),
        array('relation_service_to_clinicks'),
        false,
        false,
        'clinicsForServicesList'
    )['posts'];
endif;