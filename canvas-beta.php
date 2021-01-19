<?php

require('vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client();



// FYI this token isn't connected
$token = "11531~pSCgAK3OTlHhLbusvyOeMdLGAiZTB31640OtS2ZvWseX4HrdYEXXBxMvYPqbSyL5";

$response = json_decode($client->get('https://canvas.instructure.com/api/v1/courses?access_token=' . $token)->getBody());

foreach ( $response as $item ) {
    echo($item->name . '<br><br>');

    $assignments = json_decode($client->get('https://canvas.instructure.com/api/v1/courses/' . $item->id . '/assignments?access_token=' . $token)->getBody());

    foreach ( $assignments as $assignment ) {
        echo($assignment->name . '<br>');
    }

    echo('<br><br><br>');
}

// echo $response;
