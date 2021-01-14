<?php

require_once __DIR__.'/vendor/autoload.php';
// require 'config/config.php';
include 'func.php';
require "predis-vendor/autoload.php";
require 'config.php';

$c = new classiConfig();

Predis\Autoloader::register();

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
  ));

$experimental_features = $redis->smembers('experimental_features');
$global_message = $redis->get('global_message');

function global_message($global_message) {
        if ( !empty($global_message) ) {
                echo('<center><p style="background-color:orange;color:black">' . $global_message . '</p></center>');
            }
    }

/*
  if (in_array('<REMOVED FOR PRIVACY (WAS AN EMAIL ADDRESS)>', $experimental_features)) {
    echo '<b>Hello <REMOVED FOR PRIVACY (WAS A NAME)>! Experimental Features Mode is On!</b> You can turn it off in classi preferences.';
  }

  if (in_array('<REMOVED FOR PRIVACY (WAS AN EMAIL ADDRESS)>', $experimental_features)) {
    echo '<b>Hello <REMOVED FOR PRIVACY (WAS A NAME)>! Experimental Features Mode is On!</b> You can turn it off in classi preferences.';
  }

  if (in_array($email, $experimental_features)) {
      echo '<b>Hello ' . $fname . '! Experimental Features Mode is On!</b> You can turn it off in classi preferences.';
    }

  echo '<b>' . count($experimental_features) . ' Devs:</b><br>';

  foreach ( $experimental_features as $devs ) {
    echo $devs . '<br>';
   }
    */

echo '
<head>
<title>' . $c->get()['customization']['name'] . ' | classi</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
';

if ( isset($_COOKIE['theme']) ) {

    if ( $_COOKIE['theme'] == 'Light Theme' ) {
          echo '
            <style>
                body {
                    font-family: Comfortaa;
                }
            </style>
          ';
        }

    if ( $_COOKIE['theme'] == 'Dark Theme' ) {
          echo '
            <style>
                body {
                    font-family: Comfortaa;
                    background-color: #121212;
                    color: #cccccc;
                }

                a {
                    color: #cccccc;
                    text-decoration: none;
                }
            </style>
          ';
        }

    if ( $_COOKIE['theme'] == 'Da Lincoln Theme' ) {
          echo '
            <style>
                body {
                    font-family: Comfortaa;
                    background-color: #121212;
                    color: #ffa500;
                }

                a {
                    color: #ffa500;
                    text-decoration: none;
                }
            </style>
          ';
        }

} else {

    echo '
    <style>
        body {
            font-family: Comfortaa;
        }
    </style>
    ';

}

echo '<body>';

function authuser() {
  if(isset($_COOKIE['authuser'])) {
    $authuservalue = '?authuser=' . $_COOKIE['authuser'];
    return $authuservalue;
  }
}

session_start();

$client = new Google_Client();
$client->setApplicationName("classi");
$client->setAuthConfig('../gcred.json');
$client->addScope('email');
$client->addScope('profile');
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSES_READONLY);
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
$client->setLoginHint($_COOKIE['auth-login-hint']);

if (isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);

  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $fname =  $google_account_info->given_name;
  $profile =  $google_account_info->picture;
  setcookie('auth-login-hint', $email, time() + (86400 * 30), "/");
  setcookie('email', $email, time() + (86400 * 30), "/");
  global_message($global_message);
  if (in_array($email, $experimental_features)) {
        echo '<img src="classidev.png" height="24px" width="24px" style="margin-top:1rem;margin-left:1rem">';
      }

  echo '<center>';

  echo "<img src='classi.png' height='80px' width='80px' style='margin-top:2rem'><br><br>";

  echo '<h1>' . $config['welcome-back-message'] . ' ' . $fname . '</h1>';

  //echo '<img src="' . $profile . '">' . '<br>' . $config['welcome-back-message'] . ' ' . $fname . '<br>' . $email . '<br>';

  $service = new Google_Service_Classroom($client);
  $optParams = array('pageSize' => 10);
  $results = $service->courses->listCourses($optParams);

  echo '<br>';



  function listAssignments($service, $courseId) {
    $params = array(
        'pageSize' => 5,
        'orderBy' => 'dueDate asc'
    );

  //echo '<br>';
    $workresults = $service->courses_courseWork->listCoursesCourseWork($courseId, $params);
    //echo 'Course: ' . $courseId . '<br>';
        foreach ($workresults->getCourseWork() as $assignment) {
            echo '<a href="' . $assignment->getAlternateLink() . authuser() . '" target="_blank"><b>' . $assignment->getTitle() . '</b></a><br>';
        }
  echo '<br><br>';
  }



if (count($results->getCourses()) == 0) {
    echo "No courses found.\n";
  } else {
    foreach ($results->getCourses() as $course) {
      if ( $course->getCourseState() == 'ACTIVE' ) {
      echo '<h3><a href="' . $course->getAlternateLink() . authuser() . '" target="_blank">' . $course->getName() . '</a></h3>';
      listAssignments($service, $course->getId());
    }
    }
}

echo '<a href="preferences" target="_blank"><button>Preferences</button></a> ';
echo '<a href="privacy.php" target="_blank"><button>Privacy Policy</button></a> ';
echo '<a href="stats.php" target="_blank"><button>Stats</button></a><br><br>';

//echo '<br><br><b><u>Stats</u></b>' . '<b>' . count($redis->smembers('classidevs')) . '</b> Developer(s) Contribute to the classi Project<br><br>';

if (in_array($email, $experimental_features)) {
        echo '<img src="classidev.png" height="24px" width="24px" style="margin-top:1rem;margin-left:1rem"> <p>You are a classi contributor.</p>';
      }

} else {
  $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/vault.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}



#          __                _
#    _____/ /___ ___________(_)
#   / ___/ / __ `/ ___/ ___/ /
#  / /__/ / /_/ (__  |__  ) /
#  \___/_/\__,_/____/____/_/
#
#  </> with <3 by the classi Team
#





#
#   _ _             _     _   _           _
#  | (_)_ _  __ ___| |_ _| |_| |_  ___ __| |_____ __
#  | | | ' \/ _/ _ \ | ' \  _| ' \/ -_) _` / -_) V /
#  |_|_|_||_\__\___/_|_||_\__|_||_\___\__,_\___|\_/
#
#  Linux, Raspberry Pi, PHP
#
#  Check Me Out on GitHub: @lincolnthedev
#  Send Me an Email: contact@askthetech.guru
#
