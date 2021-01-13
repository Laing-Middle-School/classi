<?php

ob_start();

require_once __DIR__.'/vendor/autoload.php';
require 'config.php';

$c = new classiConfig();

session_start();

$client = new Google_Client();
$client->setApplicationName("classi");
$client->setAuthConfigFile('gcred.json');
$client->setRedirectUri($c->get()['important']['install-loc'] . '/vaultdoor.php');
$client->addScope('email');
$client->addScope('profile');
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSES_READONLY);
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
$client->addScope(Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS_READONLY);
$client->setIncludeGrantedScopes(true);
$client->setLoginHint($_COOKIE['auth-login-hint']);

require "vendor/autoload.php";

Predis\Autoloader::register();

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
  ));

if (! isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  //echo "<center><p style='margin-top:100px'>Authenticated! Returning to " . $config['site-name'] . "...</p></center>";
  if ( !isset($_COOKIE['authuser']) or !isset($_COOKIE['theme']) ) {
        setcookie('authuser', '0', time() + (86400 * 30 * 9999), "/");
        setcookie('theme', 'Light Theme', time() + (86400 * 30 * 9999), "/");
    }
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  if ( $redis->sismember('users', $email) == false ) {

        $log  = "New User,".
                date("Y, F j, g:i a").",".
                $name.",".
                $email.",".
                "~".
                PHP_EOL;
        //Save string to log, use FILE_APPEND to append.
        file_put_contents('acclog.csv', $log, FILE_APPEND);

        $redis->sadd('users', $email);
    }

/*
  if (in_array($email, $experimental_features)) {
          echo '<img src="classidev.png" height="24px" width="24px" style="margin-top:1rem;margin-left:1rem"> <p>You are a classi contributor.</p>';
        }
*/

  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/assignments.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

ob_end_flush();
