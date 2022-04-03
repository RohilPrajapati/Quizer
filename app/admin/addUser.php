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
                $q_insert = "INSERT INTO users (username, email, password, is_admin) VALUES ('$username','$email', '$h_password',1)";
                if ($result = mysqli_query($conn,$q_insert)){
                    redirectAlertMessage('User has benn register','user.php');                }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/main.js"></script>
</head>
<body>
    <div class="main_container">
        <?php include_once 'admin_nav.php';?>
        <div class="container">
            <h3 class="header">Add User</h3>
            <form action="" method="post" class="signup_form" id="player_registeration_form" onsubmit="event.preventDefault(); validateRegistration()">
                <input type="text" name="username" id="username" class="inputBox" placeholder="Username"><br>
                <div class="error" id="username_error"></div>
                <input type="email" name="email" id="signup_email" class="inputBox" placeholder="E-mail"><br>
                <div class="error" id="signup_email_error"></div>
                <input type="password" name="password" id="signup_password" class="inputBox inputBox_password" placeholder="Password"><input type="checkbox" name="hideshow" class="toggler" onclick="signUpshowHide()"><br>
                <input type="password" name="c_password" id="c_password" class="inputBox inputBox_password" placeholder="Confirm Password"><input type="checkbox" name="hideshow" class="toggler" onclick="signUpShowHideConfirm()"><br>
                <div class="error" id="signup_password_error"></div>
                <input class="btn" type="submit" value="Add Admin">
                <input class="btn" type="button" value="cancel" onclick="window.location.href='user.php'">

            </form>
        </div>
    </div>
    
</body>
</html>