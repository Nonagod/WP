<?php
session_start();
define( 'THEME_URL', get_template_directory_uri() );
define( 'THEME_DIR', get_template_directory() );

if( file_exists(__DIR__ . '/functionality/index.php') ) require_once __DIR__ . '/functionality/index.php';

function paginationForOtherCategory() {
    add_rewrite_rule('others/page/?([0-9]{1,})/?$', 'index.php?category_name=others&paged=$matches[1]', 'top');
}
add_action('init', 'paginationForOtherCategory');

function paginationForServicesCategory() {
    add_rewrite_rule('services/page/?([0-9]{1,})/?$', 'index.php?category_name=services&paged=$matches[1]', 'top');
}
add_action('init', 'paginationForServicesCategory');

function paginationForEventsCategory() {
    add_rewrite_rule('events/page/?([0-9]{1,})/?$', 'index.php?category_name=events&paged=$matches[1]', 'top');
}
add_action('init', 'paginationForEventsCategory');