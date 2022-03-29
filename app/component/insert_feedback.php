<?php
    require '../config/dbconfig.php';
    require '../config/utility.php';
    session_start();
        if($_POST){
            $title = $_REQUEST['title'];
            $message = $_REQUEST['message'];
            $user_id = $_SESSION['id'];
            $q_insert = "INSERT INTO feedbacks (title, message, user_id) VALUES ('$title', '$message','$user_id')";
            if (mysqli_query($conn,$q_insert)){
                redirectAlertMessage('feedback has been submited ! ','/index.php');
            }
            else{
                redirectAlertMessage('feedback has not been submited due to server error ! ','/index.php');            }
        }
?>