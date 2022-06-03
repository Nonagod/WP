<?php

if( !function_exists( 'includeFunctionality' )) {
    function includeFunctionality( $name ) {
        $path = __DIR__ . DIRECTORY_SEPARATOR . $name . DIRECTORY_SEPARATOR . 'index.php';
        if( file_exists( $path )) require_once $path;
    }
}else throw new \Exception('WebsterSTD: Function "includeFunctionality" is already exist!');


includeFunctionality( 'wp_menu' );
includeFunctionality( 'acf' );