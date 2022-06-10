<?php
use Nonagod\UserActions\Manager;

add_action( 'wp', function() {
    global $UserActions;
    $UserActions = new Manager( THEME_DIR . '/.resources/uam' );
});