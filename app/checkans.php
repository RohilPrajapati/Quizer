<?php
session_start();
require_once 'config/utility.php';
require_once 'config/dbconfig.php';
$marks = 0;
$correct_ans_arr = [];
$attempt_question = 0;
if (isset($_POST['submit'])) {
    if (empty($_REQUEST['answers'])) {
        redirectAlertMessage('Your answer is empty ! please answer anyone', 'games.php');
    } else {
        $answers = $_REQUEST['answers'];
        foreach ($answers as $key => $a_id) {
            $q_question = "SELECT * from questions where qns_id = '$key'";
            $result = mysqli_query($conn, $q_question);
            $q_result = mysqli_fetch_array($result);
            // echo $q_result['ans_id']."<br>"; 
            if ($q_result['ans_id'] == $a_id) {
                array_push($correct_ans_arr, 1);
                $marks++;
                $attempt_question++;
            } else {
                array_push($correct_ans_arr, 0);
                $attempt_question++;
            }
        }
        $u_id = $_SESSION['id'];
        $q_insert_score = "INSERT INTO scores (attemptNumQues, marks, user_id) values ('$attempt_question','$marks','$u_id')";
        // mysqli_query($conn,$q_insert_score);
        if ($result = mysqli_query($conn, $q_insert_score)) {
            // header("refresh:10;url=games.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>
    <?php require_once 'component/nav.php'; ?>
    <h1 class="header">Result</h1>
    <table>
        <tr>
            <td>Correct Answer</td>
            <td><?= $marks ?></td>
        </tr>
        <tr>
            <td>Out of 5 you have attempt </td>
            <td><?= $attempt_question ?></td>
        </tr>
        <tr>
            <th>Question Number</th>
            <th>Correct Status</th>
        </tr>
        <?php 
        $i=1;
        foreach ($correct_ans_arr as $correct_ans) {
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?php
                    if($correct_ans==1){
                        echo "Correct";
                    }else{
                        echo "Incorrect";
                    }
                ?></td>
            </tr>
        <?php
        $i++;
        } ?>
    </table>
        <a href="games.php" class="btn play_again_btn">Play Again</a>
</body>

</html>
<!-- echo "Your marks = ".$marks."<br>";
    echo "Out of 5 you have attempt = ".$attempt_question; -->
<?php

?>