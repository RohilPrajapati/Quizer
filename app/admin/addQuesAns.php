<?php
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    require '../component/user_fetch.php';
    session_start();
    if(!$_SESSION['id']){
        redirectAlertMessage('You are not login. Please login first','login.html');
    }
    if(!$user['is_admin']){
        redirectAlertMessage("You are not admin Please login again",'login.html');
    }
    if($_POST){
        $question = $_REQUEST['question'];
        $answer1 = $_REQUEST['answer1'];
        $answer2 = $_REQUEST['answer2'];
        $answer3 = $_REQUEST['answer3'];
        $correctAns = $_REQUEST['correctAns'];
        
        $q_question = "SELECT * FROM questions where question = '$question'";
        $result_qns = mysqli_query($conn,$q_question);
        if(mysqli_num_rows($result_qns)==0){
            $q_insert_qns = "INSERT INTO questions (question) value ('$question')";
            mysqli_query($conn,$q_insert_qns);
            $result_qns = mysqli_query($conn,$q_question);
            $qns = mysqli_fetch_array($result_qns);
            $q_id = $qns['qns_id'];
            // print_r($qns);
            $q_insert_ans = "INSERT INTO answers (answer,qns_id) VALUES ('$answer1','$q_id'),('$answer2','$q_id'),('$answer3','$q_id'),('$correctAns','$q_id')";
            $result_ans = mysqli_query($conn,$q_insert_ans);
            $select_last_ans = "SELECT * FROM answers ORDER BY ans_id DESC LIMIT 1";
            $result_correct_ans = mysqli_query($conn,$select_last_ans);
            $corAns = mysqli_fetch_array($result_correct_ans);
            $a_id = $corAns['ans_id'];
            $q_id = $corAns['qns_id'];
            $q_update_qns = "UPDATE questions SET ans_id = '$a_id' WHERE qns_id = '$q_id'";
            mysqli_query($conn,$q_update_qns);
            echo "
                <script>
                    msg = document.getElementById('success_msg');
                    msg.innerHTML = 'Question and Answer has been inserted';
                    msg.style.display = 'block';
                    msg.style.color = 'green';
                </script>
            ";

        }else{
            echo "
            <script>
                msg = document.getElementById('success_msg');
                msg.innerHTML = 'Question and Answer has been inserted';
                msg.style.display = 'block';
                msg.style.color = 'red';
            </script>
            ";        
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question and Answer</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/main.js"></script>
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php'; ?>
        <div class="container">
            <h1 class="header">Add Questions and Answers</h1>
            <div class="success_msg" id="success_msg">

            </div>
            <form class="admin_form" action="" method="post" onsubmit="event.preventDefault(); addQnsAnsValidation();">
                <input type="text" class="quesinput" id="question"  name="question" placeholder="Question"><br>
                <span id="qns_error"></span>
                <input type="text" class="input" id="answer1" name="answer1" placeholder="Answer 1"><br>
                <input type="text" class="input" id="answer2" name="answer2" placeholder="Answer 2"><br>
                <input type="text" class="input" id="answer3" name="answer3" placeholder="Answer 3"><br>
                <input type="text" class="input correct_ans" id="correctAns" name="correctAns" placeholder="Correct Answer"><br>
                <span id="ans_error"></span>
                <input class="btn" class="submitbutton"  type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>

