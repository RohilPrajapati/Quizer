<?php
    include '../config/utility.php';
    session_start();    
    if(isset($_SESSION['id'])){

        session_unset();
        session_destroy();
        redirectAlertMessage('You have been logout !','login.html');
    }
    else{
        echo "You are not login!";
    }
?>