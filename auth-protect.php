<?php

include('vendor/autoload.php');

session_start();

$client = new Google_Client();
$client->setApplicationName("classi");
$client->setAuthConfig('../gcred.json');
$client->addScope('email');
$client->addScope('profile');
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSES_READONLY);
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
$client->setLoginHint($_COOKIE['auth-login-hint']);



function kickToLogin() {
    header('Location: index.php');
    exit;
}



if ( isset($_SESSION['access_token']) ) {

    $client->setAccessToken($_SESSION['access_token']);

    if ( $client->isAccessTokenExpired() ) {
        kickToLogin();
    }

} else {
    kickToLogin();
}
