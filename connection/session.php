<?php 

    session_start();

    if(isset($_SESSION["username"]))
    {
        echo "session set";
    }
    else
    {
        echo "session not set";
    }
?>