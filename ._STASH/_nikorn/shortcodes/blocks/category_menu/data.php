<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

if( $wstd_gd_cl )
    $data = $wstd_gd_cl->getTermsData(array( 'taxonomy' => 'category', 'exclude' => array(13), 'orderby' => 'meta_value', 'meta_key' => 'sort_index', 'order' => 'desc') );