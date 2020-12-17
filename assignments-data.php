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
            <a href="' . $assignmentURL . '" class="btn btn-primary btn-sm">View Assignment</a>
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
        foreach ($workresults->getCourseWork() as $assignment) {
            // echo '<a href="' . $assignment->getAlternateLink() . authuser() . '" target="_blank"><b>' . $assignment->getTitle() . '</b></a><br>';
            echoCoursework($courseName, $assignment->getTitle(), $assignment->getAlternateLink() . $authuser);
        }
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
