<?php

require_once __DIR__.'/vendor/autoload.php';
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
                echo '<center><p style="background-color:orange;color:black">' . $global_message . '</p></center>';
            }
    }

session_start();





if ( isset($_COOKIE['consent']) and $_COOKIE['consent'] == 'yes' ) {
} else {
    echo('<meta http-equiv="refresh" content="2;url=assignments.php">');
    exit;
}

echo('
<html lang="en">

  <meta charset="utf-8">
  <meta name="classi" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="South Seventh Software">

  <title>classi</title>

  <!-- Bootstrap core CSS -->
  <link href="' . $c->get()['important']['install-loc'] . '/bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts Comfortaa Font -->
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="' . $c->get()['important']['install-loc'] . '/bootstrap/css/small-business.css" rel="stylesheet">

<head
');



echo('
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">classi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="assignments.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="links.php">Links</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="Communications2.html">Communications</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          -->
        </ul>
      </div>
    </div>
  </nav>
');





function authuser() {
  if(isset($_COOKIE['authuser'])) {
    $authuservalue = '?authuser=' . $_COOKIE['authuser'];
    return $authuservalue;
  }
}

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

  if ($client->isAccessTokenExpired()) {
    // If user is logged in properly
  } else {
    echo('
      <!-- Page Content -->
      <div class="container">

        <!-- Heading Row -->
        <div class="row align-items-center my-5">
          <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://raw.githubusercontent.com/Laing-Middle-School/classi/master/classi.png" alt="">
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-lg-5">
            <h1 class="font-weight-light">Shouldn'."'".'t you be in class right now?</h1>
            <p>Welcome to classi! If you have an account please click the button below to login.</p>
            <a class="btn btn-primary" href="' . $c->get()['important']['install-loc'] . '/vault.php">Log In</a>
          </div>
          <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    ');

    exit;
  }

  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $fname =  $google_account_info->given_name;
  $profile =  $google_account_info->picture;
  setcookie('auth-login-hint', $email, time() + (86400 * 30), "/");
  setcookie('email', $email, time() + (86400 * 30), "/");
  global_message($global_message);
  /*
  if (in_array($email, $experimental_features)) {
        echo '<img src="classidev.png" height="24px" width="24px" style="margin-top:1rem;margin-left:1rem">';
      }
    */
echo('
  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="https://raw.githubusercontent.com/Laing-Middle-School/classi/master/classi.png" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Hello there, ' . $fname . '! Thanks for using classi!</h1>
        <p>You can take a look at your assignments below.</p>
        <!-- <a class="btn btn-primary" href="#">Learn More</a> -->
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
');



echo('
    <!-- Learn More -->
    <div class="card text-dark bg-secondary my-2 py-1 text-center">
      <div class="card-body">
        <p class="m-0" style="color:white">If you only see your Google Classroom assignments, you need to connect Canvas.</p>
      </div>
    </div>
');







  $service = new Google_Service_Classroom($client);
  $optParams = array('pageSize' => 10);
  $results = $service->courses->listCourses($optParams);

  echo '<br>';



function echoCoursework($className, $assignmentName, $assignmentURL) {

    echo('

      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">' . $className . '</h2>
            <p class="card-text">' . $assignmentName . '</p>
          </div>
          <div class="card-footer">
            <a href="' . $assignmentURL . '" target="_blank" class="btn btn-primary btn-sm">View Assignment</a>
          </div>
        </div>
      </div>

    ');

}



  function listAssignments($service, $courseId, $courseName, $authuser) {
    $params = array(
        'pageSize' => 5,
        'orderBy' => 'dueDate asc'
    );

  //echo '<br>';
    $workresults = $service->courses_courseWork->listCoursesCourseWork($courseId, $params);
    //echo 'Course: ' . $courseId . '<br>';

        $i = 0;

        echo('<div class="row">');

        foreach ($workresults->getCourseWork() as $assignment) {
            echoCoursework($courseName, $assignment->getTitle(), $assignment->getAlternateLink() . $authuser);
            if ( ++$i%3 === 0 ) { echo('</div><br><div class="row">'); }
        }

        echo('</div>');

  echo '<br><br>';
  }



if (count($results->getCourses()) == 0) {
    echo "No courses found.\n";
  } else {
    foreach ($results->getCourses() as $course) {
      if ( $course->getCourseState() == 'ACTIVE' ) {
      // echo '<h3><a href="' . $course->getAlternateLink() . authuser() . '" target="_blank">' . $course->getName() . '</a></h3>';
      listAssignments($service, $course->getId(), $course->getName(), authuser());
    }
    }
}







echo('
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">This work by contributors at Laing Middle School is under Creative Commons License CC BY-NC-SA<br>Theme derived from work by Start Bootstrap<br>The classi logo and name are unregistered trademarks of @lincolnthedev</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
');

} else {

    echo('
      <!-- Page Content -->
      <div class="container">

        <!-- Heading Row -->
        <div class="row align-items-center my-5">
          <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://raw.githubusercontent.com/Laing-Middle-School/classi/master/classi.png" alt="">
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-lg-5">
            <h1 class="font-weight-light">Shouldn'."'".'t you be in class right now?</h1>
            <p>Welcome to classi! If you have an account please click the button below to login.</p>
            <a class="btn btn-primary" href="' . $c->get()['important']['install-loc'] . '/vault.php">Log In</a>
          </div>
          <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    ');

}