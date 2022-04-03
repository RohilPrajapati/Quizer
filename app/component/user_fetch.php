<?php
    
    session_start();
    // require '../config/utility.php';
    // D:\rohilcollege\fourth sem\project I\mcq\app\config\dbconfig.php
    // D:\rohilcollege\fourth sem\project I\mcq\app\component\user_fetch.php


// yo path hada error aayo 1!
    require_once (__DIR__.'\..\config\dbconfig.php');
    // print_r($conn);


    $conn = mysqli_connect('localhost','mcq_rohil','password','mcq');
    if (isset($_SESSION['id'])){
        $q_user = 'SELECT * from users WHERE user_id='.$_SESSION['id'];
        $result = mysqli_query($conn,$q_user);
        if (mysqli_num_rows($result) != 0){
            $user = mysqli_fetch_array($result);
        }else{
            redirectAlertMessage("Session is invalid Please login again","../admin/login.php");
            session_unset();
            session_destroy();
        }
    }
?>