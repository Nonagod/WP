<?php
define( 'THEME_URL', get_template_directory_uri( ));
define( 'THEME_DIR', get_template_directory( ));


/*include libraries*/
$path_to_composer_autoload = __DIR__ . '/composer/vendor/autoload.php';
if( file_exists( $path_to_composer_autoload )) require_once $path_to_composer_autoload;


/*include functionalities*/
$path_to_functionalities = __DIR__ . '/functionalities/autoload.php';
if( file_exists( $path_to_functionalities )) require_once $path_to_functionalities;