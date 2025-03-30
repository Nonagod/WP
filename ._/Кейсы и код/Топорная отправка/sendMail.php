<?php

require_once __DIR__ .'/wp-load.php';

function sendResponse( bool $status, string|array $data ) {
    die(json_encode(array(
        'status' => $status,
        'result' => $data
    )));
}

if( !function_exists('get_field' )) sendResponse( false, 'Server error' );

$admin_email = get_field( 'email', 'options' );

if( !$admin_email ) sendResponse( false, 'Server error 1' );

$email = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL );
$message = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$policy = filter_input( INPUT_POST, 'policy', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

if( !$policy || !$email || !$message ) sendResponse( false, 'Required form fields are not filled in' );

$headers[] = 'Content-type: text/html; charset=utf-8';

if( mail( $admin_email, '1st Partner: Partner form', "E-mail: $email <br/> Policy: accepted<br/> Message: <br/> <p>$message</p>", implode("\r\n", $headers)))
    sendResponse( true, 'Form sended' );
else
    sendResponse( false, 'Server error' );