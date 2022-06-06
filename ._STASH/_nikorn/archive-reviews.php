<?php get_header();

if( $_POST['ajax'] == 'reviews_tax' ) {ob_clean();}
//_p($wstd_gd_cl);
echo do_shortcode('[load_block block="code_category-filter" taxonomy="reviews_tax" filter_classes=" filter_color-grey"][/load_block]');
echo do_shortcode('[load_block block="code_elements-list"][/load_block]');

if( $_POST['ajax'] == 'reviews_tax' ) {ob_end_flush(); die();}

 get_footer();
