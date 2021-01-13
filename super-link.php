<?php

ob_start();

if ( isset($_GET['location']) ) {





if ( $_GET['location'] == 'clever' ) {
    echo('
        <title>classi</title>
        <center><br>
            <img src="resources/preloader.gif"/>
            <h1 style="font-size:70px"><b>classi</b> Super Link</h1>
            <p>By <b>@lincolnthedev</b></p>
            <script>
                sl_popup = window.open("https://clever.com/oauth/google/login");
                setTimeout(closepopup, 1000);
                function closepopup() {
                    sl_popup.close();
                }
            </script>
            <meta http-equiv="refresh" content="3;url=https://clever.com/oauth/google/login">
        </center>
    ');
}





}

ob_end_flush();
