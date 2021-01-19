<?php

require('vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client();



$token = "11531~pSCgAK3OTlHhLbusvyOeMdLGAiZTB31640OtS2ZvWseX4HrdYEXXBxMvYPqbSyL5";

$response = $client->get('https://canvas.instructure.com/api/v1/courses?access_token=' . $token)->getBody();

echo $response;
