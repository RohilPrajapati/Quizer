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
    <link rel="stylesheet" href="../css/admin.css">
    <title>User List</title>
</head>
<body>
<div class="main_container">
    <?php include 'admin_nav.php' ?>
    <div class="container">
        <input type="button" onclick="window.location.href='addUser.php'" value="Add Product" class="btn">
        <h3 class="header">User List</h2>
            <table>
                <tr>
                    <th>Serial Number</th>
                    <th>username</th>
                    <th>email</th>
                    <th>is_admin</th>
                    <th>is_player</th>
                </tr>
                <?php
                    $q_user = "SELECT * FROM users";
                    $result = mysqli_query($conn,$q_user);
                    $i=1;
                    if(mysqli_num_rows($result)>0){
                        while($user = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['is_admin']; ?></td>
                        <td><?= $user['is_player']; ?></td>
                    </tr>
                        
                <?php
                    $i++;
                        }
                    }

                ?>
            </table>
    </div>
</div>
</body>
</html>