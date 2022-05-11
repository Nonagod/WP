<?php get_header();

echo do_shortcode('[load_block block="system_services-list"][/load_block]');

$text = get_field( 'OPT_page-texts_services', 'option' );
if( $text ):
	echo do_shortcode('[load_block block="attr_free-content"]' . $text . '[/load_block]');
endif;

echo do_shortcode('[load_block block="system_clinics-map"][/load_block]');

get_footer();
