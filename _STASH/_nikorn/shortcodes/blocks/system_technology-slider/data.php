<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */

if($wstd_gd_cl):
    $data = $wstd_gd_cl->getElementsData(
        array(
            'post_type' => 'tehnology',
            'posts_per_page' => -1
        )
    );
endif;