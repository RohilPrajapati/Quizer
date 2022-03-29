<?php
    require '../config/dbconfig.php';
    require '../config/utility.php';
    require '../component/user_fetch.php';
    session_start();
    if(!$_SESSION['id']){
        redirectAlertMessage('You are not login. Please login first','login.html');
    }
    else if(!$user['is_admin']){
        redirectAlertMessage("You are not admin Please login again",'login.html');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Message</title>
</head>
<body>
<div class="main_container">
    <?php include 'admin_nav.php' ?>
    <div class='container'>
        <h1 class="header">Feedback Message</h1>
        <table>
            <tr>
                <th>Serial Number</th>
                <th>Username</th>
                <th>Title</th>
                <th>Message</th>
            </tr>
        <?php 
            $q_fetch_msg = "SELECT * FROM feedbacks ORDER BY fb_id DESC";
            $result = mysqli_query($conn,$q_fetch_msg);
            $i = 1;
            ;
            // print_r($msg)
            while($msg = mysqli_fetch_array($result)) 
            { 
            ?> 
            <tr>
                <td><?php echo $i ?></td> 
                <td>
                    <?php 
                        $q_user = 'SELECT username from users WHERE user_id='.$msg['user_id'];
                        $result1 = mysqli_query($conn,$q_user);
                        $user = mysqli_fetch_array($result1);
                        echo $user['username'];
                        // print_r($user);
                    ?>
                </td> 
                <td><?php echo $msg['title']; ?></td> 
                <td><?php echo $msg['message']; ?></td> 
            </tr> 
        <?php 
            $i++;   
            } 
        ?> 
        </table>
    </div>
    </div>
</body>
</html>