<?php
    require '../config/dbconfig.php';
    require '../config/utility.php';
    require '../component/user_fetch.php';  
    session_start();
    if(!$_SESSION['id']){
        redirectAlertMessage('You are not login. Please login first','login.html');
    }
    if(!$user['is_admin']){
        redirectAlertMessage("You are not admin Please login again",'login.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['username'] ?></title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php' ?>
        <div class="container">
            <h1 class="header">Admin Profile</h1>
            <div class="player_info">
                Name : <?php echo $user['username'] ?><br>
                Email : <?php echo $user['email'] ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    mysqli_close($conn);
?>