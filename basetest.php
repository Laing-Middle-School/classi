<?php
include 'head.php';

  if (in_array($email, $experimental_features)) {
        echo '<b>Hello ' . $fname . '! Experimental Features Mode is On!</b> You can turn it off in classi preferences.<br>';
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
echo '<a href="privacy.php" target="_blank"><button>Privacy Policy</button></a>';

echo '<br><b>' . count($redis->smembers('classidevs')) . '</b> Developers Contribute to the classi Project<br><br>';

} else {
  $redirect_uri = 'https://' . $_SERVER['HTTP_HOST'] . '/vault.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
