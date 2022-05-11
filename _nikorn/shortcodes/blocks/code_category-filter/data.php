<?
/**
 * @var object WSTDGetData $wstd_gd_cl
 * @var array $attr - shortcode parameters
 * @var string $content - shortcode content
 * @var string $tag - name of shortcode
 */



if( $wstd_gd_cl ) {
    $type = ( $attr['taxonomy'] ) ? $attr['taxonomy'] : 'category' ;

    $data = $wstd_gd_cl->getTermsData(array( 'taxonomy' => $type ) );

    $data['options'] = $wstd_gd_cl->getOptions(array('pr_text-under-title'));
}
