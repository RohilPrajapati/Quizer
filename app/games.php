<?php 
    session_start();
    if($_SESSION['id']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>
<body>
    <?php
        include "component/nav.php"
    ?>
    <div class="container">
        <form class="mcq_form" action="checkans.php" method="POST">
            <h1 class="mcq_heading">Question</h1>
            <?php
                require_once 'config/dbconfig.php';
                $q_question = "SELECT * from questions ORDER BY RAND() LIMIT 5";
                $result = mysqli_query($conn,$q_question); 
                $i=1;
                while ($question = mysqli_fetch_array($result)){
                    $qns_id = $question['qns_id'];
                    $q_answer = "SELECT * from answers where qns_id = '$qns_id' ORDER BY RAND() LIMIT 4 ";
                    $resultans= mysqli_query($conn,$q_answer);
            ?>
            <h3 class="question"><?php echo $i.". "; echo $question['question']; ?></h3>
            
            <div class="answer">
            <?php 
                while ($ans = mysqli_fetch_array($resultans)) { 
            ?>
                <div class="ans_item">
                    <input class="ans_chkbox" type="radio" name="answers[<?php echo $qns_id; ?>]" id="<?php echo $ans['ans_id'] ?>" value="<?php echo $ans['ans_id'] ?>">
                    <label><?php echo $ans['answer'] ?></label>
                </div>
            <?php } ?>
            </div>
            <?php
                $i++;
                } 
            ?>
            <input class="msg_btn" name="submit" type="submit" value="Submit">
        </form>
    </div>
    
</body>
</html>
<?php }
    else {
        echo "please login to play game".'<br>';
        echo "<a href='account.php'>Account</a>";
}
?>