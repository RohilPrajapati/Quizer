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
            if (password_verify($password,$user['password'])){
                if ($user['is_admin'] == 1){
                    session_start();
                    $_SESSION['id'] = $user['user_id'];
                    header("location: dashboard.php");
                }else{
                    redirectAlertMessage('Email or password is Invalid','login.html');
                }
            }
            else{
                redirectAlertMessage('Password is not valid','login.html');
            }
        }
    }
?>