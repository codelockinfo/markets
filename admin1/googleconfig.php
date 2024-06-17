<?php
require_once '../vendor/autoload.php';
$sql = "SELECT * FROM thirdparty_apikey WHERE status ='1'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $thirdparty_apidata = mysqli_fetch_assoc($result);
}
if(!empty($thirdparty_apidata)){
    $clientID = $thirdparty_apidata['clientID'];
    $clientSecret = $thirdparty_apidata['clientSecret'];
}
// init configuration
$redirectUri = SITE_ADMIN_URL.'index.php';
// https://codelocksolutions.in/YouTube/php-google-login/welcome.php

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");