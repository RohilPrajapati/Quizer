<?php
    require '../config/utility.php';
    require '../config/dbconfig.php';
    require '../component/user_fetch.php';
    if ($_SESSION['id']){
        if ($user['is_admin']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="main_container">
    <?php include 'admin_nav.php' ?>
    <div class='container'>
        <div class="top_nav">
            
        </div>
        <h1 class="header">Score List</h1>
        <table>
            <tr>
                <th>Serial Number</th>
                <th>Username</th>
                <th>Attempted Question</th>
                <th>Marks</th>
            </tr>
        <?php 
            $q_fetch_score = "SELECT scores.attemptNumQues, scores.marks, users.username FROM scores INNER JOIN users ON scores.user_id=users.user_id order by s_id desc;";
            $result = mysqli_query($conn,$q_fetch_score);
            $i = 1;
            ;
            // print_r($msg)
            while($score = mysqli_fetch_array($result)) { 
            ?> 
            <tr>
                <td><?php echo $i ?></td> 
                <td>
                    <?= $score['username']; ?>
                </td> 
                <td><?php echo $score['attemptNumQues']; ?></td> 
                <td><?php echo $score['marks']; ?></td> 
            </tr> 
        <?php 
            $i++;   
            } 
        ?> 
        </table>
        </p>
    </div>
    </div>
</body>
</html>
<?php
        }else{
            redirectAlertMessage("You are not admin Please login again",'login.html');
        }
    }else{
        redirectAlertMessage("You are not login",'login.html');
    }
?>