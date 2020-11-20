#!/usr/bin/php -q

<?php

/*

    classi PHP Installation Script

*/



/* Define STDIN in case if it is not already defined by PHP for some reason */
if(!defined("STDIN")) {
define("STDIN", fopen('php://stdin','r'));
}



function install($program) {

        $toInstall = str_replace(array("\n", "\r"), '', $program);

        echo 'Attempting to Install "' . $toInstall . '"';

        exec('brew install ' . $toInstall . ' >/dev/null 2>/dev/null', $output, $return);

        if (!$return) {
            echo "\n\n\n" . '[SUCCESS] "' . $toInstall . '" Installed' . "\n\n\n";
        } else {
            echo "\n\n\n" . '[ERROR] "' . $toInstall . '" Installation Failed' . "\n\n\n";
        }

    }





    install('git');
    install('apache2');
    install('');





/*
//echo "Hello! What would you like to install?\n";
$toInstall = str_replace(array("\n", "\r"), '', fread(STDIN, 80));

echo $toInstall;

exec('brew install ' . $toInstall . ' >/dev/null', $output, $return);

if (!$return) {
    echo "\n\n" . '[SUCCESS] "' . $toInstall . '" Installed' . "\n\n\n";
} else {
    echo "\n\n" . '[ERROR] "' . $toInstall . '" Installation Failed' . "\n\n\n";
}

// echo 'Hello ' , $strName , "\n";
*/

?>