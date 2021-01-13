<?php

ob_start();

if ( isset($_GET['location']) ) {





if ( $_GET['location'] == 'clever' ) {
    echo('<title>classi</title><center><br><img src="resources/preloader.gif"/><h1 style="font-size:70px"><b>classi</b> Super Link</h1><p>By <b>@lincolnthedev</b></p><meta http-equiv="refresh" content="2;url=https://clever.com/oauth/google/login"></center><iframe src="https://clever.com/oauth/google/login" height="0px" width="0px" style="display:none" />');
}





}

ob_end_flush();
