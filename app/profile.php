<?php
    include 'component/user_fetch.php';
?>
<?php if (isset($_SESSION['id'])){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['username'] ?></title>
    <link rel="stylesheet" href="/css/homestyle.css">
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        include 'component/nav.php';
    ?>
    <div class="container">
        <div class="player_info">
            Name : <?php echo $user['username'] ?><br>
            Email : <?php echo $user['email'] ?>
        </div>
        <div class="logout_btn">
            <a class="logout" href="accounts/logout.php" onclick="Logoutconfirmation()">Logout</a>
        </div>
        <?php
        // echo $_SESSION['id'];
            $user = $_SESSION['id'];
            $q_fetch_msg = "SELECT * FROM feedbacks where user_id= '$user' ORDER BY fb_id DESC";
            $result = mysqli_query($conn,$q_fetch_msg);
            $i = 1;
            // print_r($msg)
            if(mysqli_num_rows($result)>0){
        ?>
        <h3 class="header">Feedback Message</h3>
        <table>
            <tr>
                <th>Serial Number</th>
                <th>Username</th>
                <th>Title</th>
                <th>Message</th>
                <th>Operation</th>
            </tr>
        <?php 
            
                while($msg = mysqli_fetch_array($result)){ 
            ?> 
            <tr>
                <td class="tbl_sn"><?php echo $i ?></td> 
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
                <td class="tbl_msg"><?php echo $msg['message']; ?></td>
                <td class="operation_col">
                    <a class="tbl_icon" href="deletemsg.php?id=<?=$msg['fb_id']?>"><img class="tbl_icon" src="img/trash-can-solid.svg" alt="delete" ></a>
                    <a href="updatemsg.php?id=<?=$msg['fb_id']?>"><img class="tbl_icon" src="img/update.svg" alt="update" ></a>
                </td>
            </tr> 
        <?php 
                $i++;   
                }
            } 
        ?> 
        </table>
        <?php
            $user = $_SESSION['id'];
            // $q_fetch_score = "SELECT * FROM scores where user_id = $user ORDER BY s_id DESC";
            $q_fetch_score = "SELECT scores.attemptNumQues, scores.marks, users.username, scores.s_id FROM scores INNER JOIN users ON scores.user_id=users.user_id where users.user_id  = '$user' order by s_id desc";
            $result = mysqli_query($conn,$q_fetch_score);
            // print_r($score);
            // echo (mysqli_num_rows)
            if (mysqli_num_rows($result) != 0){
        
        ?>
        <h3 class="header">Score history</h3>
        <table>
            <tr>
                <th>Serial Number</th>
                <th>Username</th>
                <th>Attempted Question</th>
                <th>Marks</th>
            </tr>
        <?php 
            $i = 1;
            ;
            while($score = mysqli_fetch_assoc($result)) { 
            ?> 
            <tr>
                <td><?php echo $i ?></td> 
                <td>
                    <?= $score['username'] ?>
                </td> 
                <td><?php echo $score['attemptNumQues']; ?></td> 
                <td><?php echo $score['marks']; ?></td> 
            </tr> 
        <?php 
            $i++;   
            }
        ?> 
        </table>
        <?php
            }
        ?>
    </div>
    
</body>
</html>
<?php } 
else {
    echo "You are not login <br>";
    echo "<a href='account.php'>Login</a>";
}
?>