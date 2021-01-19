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

if ( $_GET['location'] == 'achieve3000' ) {
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
            <meta http-equiv="refresh" content="3;url=https://clever.com/oauth/google/login?target=NTQ2NjA4ZTJhMmNiNGMwODEwMDAwNTk5;NDlkZjU5OThiZDg4NTA3NTg3NWQ=;aHR0cHM6Ly9wb3J0YWwuYWNoaWV2ZTMwMDAuY29tL3V0aWwvY2xldmVyc3NvLnBocD9wcm9kdWN0PTE=;;Y29kZQ==;">
        </center>
    ');



}





}

ob_end_flush();
