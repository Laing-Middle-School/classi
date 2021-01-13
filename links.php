<?php

    $minimal = 'yes';

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>classi Useful Links</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/small-business.css" rel="stylesheet">

  <!-- Comfortaa Font from Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">classi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="links.php">Links</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Communications2.html">Communications</a>
          </li>
      
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <?php if ( $minimal == 'yes' ) { ?>

    <!-- Heading Row -->
      <center><br><br><h1>Useful Links for classi!</h1><br></center>
    <!-- /.row -->

    <?php } else { ?>

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <center>
        <h1><b>Useful Links for classi!</b></h1>
        <p>This page is here for you to find all your links to different student platforms and apps! These categories will tell you where different apps and links are based on what they do.</p>
      </center>
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">Down below are some helpful links you may need. To use them, just click the button at the bottom of the card.</p>
      </div>
    </div>

    <?php } ?>

   <!-- Content Row -->
      <h2 style="text-align:left; margin-bottom: 40px;" class="category-title">Study Games</h2>
    <div class="row">
      <div class="col-md-2 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 style = "text-align: center; font-size: 0.9vw" class="card-title">Kahoot</h2>
            <img style = "border-radius: 25px" class="card-img" src="vendor/images/KahootImage.png" alt="">
          </div>
          <div class="card-footer">
            <a href="https://kahoot.it" target="_blank" class="btn btn-primary btn-sm col-md-12">Visit</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-2 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 style = "text-align: center; font-size: 0.9vw" class="card-title">Quizlet</h2>
            <img style = "border-radius: 25px" class="card-img" src="vendor/images/QuizletImage.jpg" alt="">
          </div>
          <div class="card-footer">
            <a href="https://quizlet.live" target="_blank" class="btn btn-primary btn-sm col-md-12">Visit</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-2 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 style = "text-align: center; font-size: 0.9vw"  class="card-title">Flocabulary</h2>
            <img style = "border-radius: 25px" class="card-img" src="vendor/images/FlocabularyImage.jpg" alt="">
          </div>
          <div class="card-footer">
            <a href="https://flocabulary.com" target="_blank" class="btn btn-primary btn-sm col-md-12">Visit</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- New category -->
      <h2 style="text-align:left; margin-bottom: 40px;" class="category-title">Other Link Hubs</h2>
      <div class="col-md-2 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 style = "text-align: center; font-size: 0.9vw" class="card-title">Clever</h2>
            <img style = "border-radius: 25px" class="card-img" src="vendor/images/CleverImage.png" alt="">
          </div>
          <div class="card-footer">
            <a href="https://clever.com/in/charleston/student/portal" target="_blank" class="btn btn-primary btn-sm col-md-12">Visit</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
  </div>
  
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
