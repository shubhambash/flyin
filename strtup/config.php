<?php

//start session on web page


//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1068584278078-6rs7r6n7fv8qmj5r6473g8pqhsqr0t0v.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('43KpNXXcka6N2fXFUF4IvqpZ');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/strtup/login_signup_page.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>