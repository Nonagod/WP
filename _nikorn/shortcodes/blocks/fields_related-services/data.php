<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */
if( $wstd_gd_cl ):
    if( $wstd_gd_cl->page_data['fields'][$attr['field']] ):
        $data = $wstd_gd_cl->parseElementObjects($wstd_gd_cl->page_data['fields'][$attr['field']], false, false);
    endif;
endif;