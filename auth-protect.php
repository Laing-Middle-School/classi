<?php

include('vendor/autoload.php');

$client = new Google_Client();
$client->setApplicationName("classi");
$client->setAuthConfig('gcred.json');
$client->addScope('email');
$client->addScope('profile');
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSES_READONLY);
$client->addScope(Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
$client->setLoginHint($_COOKIE['auth-login-hint']);



function kickToLogin() {
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





if (isset($_SESSION['access_token'])) {

    $client->setAccessToken($_SESSION['access_token']);

    if ( $client->isAccessTokenExpired() ) {
        kickToLogin();
    }

} else {
    kickToLogin();
}
