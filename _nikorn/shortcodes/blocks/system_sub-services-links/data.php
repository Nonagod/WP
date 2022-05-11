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
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'parent_relation',
                    'value' => $wstd_gd_cl->page_data['ID']
                )
            )
        )
    );
endif;