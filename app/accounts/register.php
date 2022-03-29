<?php
    include "../config/dbconfig.php";
    include "../config/utility.php";
    if($_POST){
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $h_password = password_hash($password,PASSWORD_DEFAULT);
        $q_select = "SELECT * FROM users where email='$email'";
        $users = mysqli_query($conn,$q_select);
        if (mysqli_num_rows($users) == 0){
            $q_select = "SELECT * FROM users where username='$username'";
            $users = mysqli_query($conn,$q_select);
            if(mysqli_num_rows($users) == 0){
                $q_insert = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$h_password')";
                if ($result = mysqli_query($conn,$q_insert)){
                    redirectAlertMessage('User has been register.','../account.php');
                }
                else{
                    redirectAlertMessage('Error while inserting:'.$conn->error,'../account.php');
                }
            }
            else{
                redirectAlertMessage('Username Already Exist !','../account.php');
            }
        }else{
            redirectAlertMessage('Email Already Exist !','../account.php');
        }
    }
?>