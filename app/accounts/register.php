<?php
    include "../config/dbconfig.php";
    include "../config/utility.php";
    if($_POST){
        $username = addslashes($_REQUEST['username']);
        $email = addslashes($_REQUEST['email']);
        $password = addslashes($_REQUEST['password']);
        $h_password = addslashes(password_hash($password,PASSWORD_DEFAULT));
        $q_select = "SELECT * FROM users where email='$email'";
        $users = mysqli_query($conn,$q_select);
        if (mysqli_num_rows($users) == 0){
            $q_select = "SELECT * FROM users where username='$username'";
            $users = mysqli_query($conn,$q_select);
            if(mysqli_num_rows($users) == 0){
                $q_insert = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$h_password')";
                if ($result = mysqli_query($conn,$q_insert)){
                    $to = $email;
                    $title_msg = "User has been register to Quizer";
                    $msg = "$username has been register to Quizer Play have fun";
                    send_mail($to,$title_msg,$msg);

                    redirectAlertMessage('User has been register. Mail has been send to user','../account.php');
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