<?php
require_once '../vendor/autoload.php';

// init configuration
$clientID = '341622769724-9id4hviqggn6lukh1lidaftnq4sk41uu.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = SITE_ADMIN_URL.'index.php';
// https://codelocksolutions.in/YouTube/php-google-login/welcome.php

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");