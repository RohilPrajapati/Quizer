<?php
    require_once 'config/utility.php';
    session_start();
    if($_SESSION['id']){
        redirectAlertMessage("User is already login","index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/homestyle.css">
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        include "component/nav.php";
    ?>
    <div class="forms">
        <form action="accounts/login.php" method="post" class="login_form" id="player_login_form" onsubmit="event.preventDefault(); validateLogin();">
            <h1 class="form_heading">Login</h1>
            <input type="email" name="email" id="email" class="inputBox" placeholder="E-mail"><br>
            <div class="error" id="email_error"></div>
            <input type="password" name="password" id="password" class="inputBox inputBox_password" placeholder="Password"><input type="checkbox" name="hideshow" class="toggler" onclick="showHide()"><br>
            <div class="error" id="password_error"></div>
            <input class="form_submit_btn" type="submit" value="Login">
        </form>
        <form action="accounts/register.php" method="post" class="signup_form" id="player_registeration_form" onsubmit="event.preventDefault(); validateRegistration()">
            <h1 class="form_heading">Sign Up</h1>
            <input type="text" name="username" id="username" class="inputBox" placeholder="Username"><br>
            <div class="error" id="username_error"></div>
            <input type="email" name="email" id="signup_email" class="inputBox" placeholder="E-mail"><br>
            <div class="error" id="signup_email_error"></div>
            <input type="password" name="password" id="signup_password" class="inputBox inputBox_password" placeholder="Password"><input type="checkbox" name="hideshow" class="toggler" onclick="signUpshowHide()"><br>
            <input type="password" name="c_password" id="c_password" class="inputBox inputBox_password" placeholder="Confirm Password"><input type="checkbox" name="hideshow" class="toggler" onclick="signUpShowHideConfirm()"><br>
            <div class="error" id="signup_password_error"></div>
            <input class="form_submit_btn" type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>