<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location: /admin/dashboard.php");
    }else{
        header("location: /admin/login.html");
    }
?>