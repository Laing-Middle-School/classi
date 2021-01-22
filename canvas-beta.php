<?php

require('vendor/autoload.php');

use GuzzleHttp\Client;

$guzzle = new Client();



// You must put your own token here
$token = "YOUR_TOKEN_HERE";

$response = json_decode($guzzle->get('https://canvas.instructure.com/api/v1/courses?access_token=' . $token)->getBody());

foreach ( $response as $item ) {
    echo($item->name . '<br><br>');

    $assignments = json_decode($guzzle->get('https://canvas.instructure.com/api/v1/courses/' . $item->id . '/assignments?bucket=upcoming&access_token=' . $token)->getBody());

    $i = 0;

    foreach ( $assignments as $assignment ) {
        echo($assignment->name . '<br>');
        $i++;
    }

    if ( $i == 0 ) {
        echo('<b>No Assignments</b>');
    }

    echo('<br><br><br>');
}

// echo $response;
