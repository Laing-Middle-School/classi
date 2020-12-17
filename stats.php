<?php

require "predis-vendor/autoload.php";

Predis\Autoloader::register();

$redis = new Predis\Client(array(
    "scheme" => "tcp",
    "host" => "127.0.0.1",
    "port" => 6379
  ));





echo '<center>';

echo "<img src='classi.png' height='80px' width='80px' style='margin-top:2rem'><br><br>";



echo '<h1><b><u>Stats</u></b></h1>';

echo '<h3><b>' . count($redis->smembers('classidevs')) . '</b> Developer(s) Contribute to the classi Project</h3><br>';

echo '<h3><b>' . count($redis->smembers('users')) . '</b> User(s) Have Logged in to classi (Including Devs)</h3><br>';

// echo '<h3><b>' . count($redis->smembers('activeusers')) . '</b> User(s) Have Used classi in the Last 30 Days (Including Devs)</h3><br>';



echo '<br><br><a href="index.php">Back to classi</a>';
