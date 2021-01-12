<?php

if ( isset($_COOKIE['consent']) and $_COOKIE['consent'] == 'yes' ) {
    echo('<h1>classi</h1>');
    header("Refresh:2");
}

ob_start();

echo('

<center>

<h1>Hello</h1>
<p>By clicking the link below and continuing to classi, you acknowledge that classi is beta software and consent to the use of browser cookies and/or other types of tracking for functional purposes and/or improving the classi service. No information will ever be sold to third parties.</p>
<h3><a href="?consent=true">OK</a></h3>

</center>

');

if ( isset($_GET['consent']) and $_GET['consent'] == 'true' ) {
    echo('Thank you! You will be redirected to classi in a few moments.');
    setcookie('consent', 'yes', time() + (86400 * 30 * 9999));
    header("Refresh:3");
}

ob_end_flush();
