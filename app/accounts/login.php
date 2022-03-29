<?php
    include '../config/dbconfig.php';
    require '../config/utility.php';
    if($_POST){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $q_user = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$q_user);
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_array($result);
            // print_r($user);
            // echo "working";
            // echo $user['password'];
            if (password_verify($password,$user['password'])){
                session_start();
                $_SESSION['id'] = $user['user_id'];
                header("location: ../profile.php");
            }
            else{
                redirectAlertMessage('password is incorrect, Please enter correct password.','../account.php');
            }
        }else{
            redirectAlertMessage('email is not register, Please register Email first to login.','../account.php');
        }
    }
?>