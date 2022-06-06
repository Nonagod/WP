<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

$data = array();

if( $wstd_gd_cl )
    $data = $wstd_gd_cl->getOptions(array('fb', 'inst', 'tw', 'you', 'od', 'pinterest', 'vk'));