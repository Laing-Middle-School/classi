<?php

/*

    classi Base Code

*/





    // Include

        require_once __DIR__.'/vendor/autoload.php';
        require 'config/config.php';
        include 'func.php';



    // Redis

        Predis\Autoloader::register();

        $redis = new Predis\Client(array(
            "scheme" => "tcp",
            "host" => "127.0.0.1",
            "port" => 6379
          ));

        $experimental_features = $redis->smembers('experimental_features');

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



    // Google OAuth2 API Client

        $client = new Google_Client();
        $client->setApplicationName("classi");
        $client->setAuthConfig('gcred.json');
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
        } else {
          $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/vault.php';
          header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }



    // HTML Head

        echo '

        <head>
        <title>classi</title>
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

        <body>

        ';
