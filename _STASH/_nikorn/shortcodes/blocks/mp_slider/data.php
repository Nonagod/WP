<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

$data = array();
$params = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'meta_value',
    'meta_key' => 'sort_index',
    'order' => 'desc',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => $attr['type'],//pa_nk_slider 'pa_mp_slider'
            'value' => 1
        )
    )
);

if( $wstd_gd_cl )
    $data = $wstd_gd_cl->getElementsData($params, false, false, 'category');

