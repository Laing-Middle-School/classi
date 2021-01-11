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
                echo '<center><p style="background-color:orange;color:black">' . $global_message . '</p></center>';
            }
    }





echo('
<html lang="en">

  <meta charset="utf-8">
  <meta name="classi" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="South Seventh Software">

  <title>classi</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts Comfortaa Font -->
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/small-business.css" rel="stylesheet">

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
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Links</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="#">Communications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
');



echo('
  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="https://raw.githubusercontent.com/Laing-Middle-School/classi-development/master/classi.png" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Welcome to classi</h1>
        <p>A better user interface for the Google Classroom and Canvas learning platforms<br><br>By students. For students.</p>
        <a class="btn btn-primary" href="#">Learn More</a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
');



echo('
    <!-- Learn More -->
    <div class="card text-dark bg-secondary my-2 py-1 text-center">
      <div class="card-body">
        <p class="m-0" style="color:white">You' . "'" . 're already logged in! Click a card below to get to what you are looking for!</p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Assignments</h2>
            <p class="card-text">Find your homework, to-do' . "'" . 's, and projects here! All assignments are displayed with the time left remaining for each task for users to keep track of every upcoming task needed to be done. It is important for students to be aware of their upcoming due dates so they are able to complete assignments on time. Users are able to mark their completion of assignments after fufillment.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Events</h2>
            <p class="card-text">All upcoming events happening in your school/district are viewed here. Click on this card to view all that will occur in and out your area for further notice. These reminders are for the purpose to prompt students on finding out the lastest news and upcoming events/occasions.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Reminders</h2>
            <p class="card-text">You can access their daily reminders sent from teachers and administrators on this card. Whether it' . "'" . 's to bring money for a field trip or an annoucement to audition for the school play all students can view their reminders here. The importance for students to know what they must get done is crucial, and classi provides a way for students to access these ' . "To-Do's." . '</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->
');



echo('
    <!-- Content Row -->
    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">By Students, For Students</h2>
            <p class="card-text">classi is a project created by and run by students. classi' . "'" . 's main goal is to make being a student in this technological age easier.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Open Source</h2>
            <p class="card-text">All of classi' . "'" . 's code is available to anyone that wants to take a look at it or contribute to it.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Info for Nerds</h2>
            <p class="card-text">Built with <b>PHP</b><br>Hosted by <b>Linode</b><br>Run Using <b>Docker</b><br>Version Control by <b>GitHub</b></p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">Access</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->

    </div>
    <!-- /.row -->
');



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
