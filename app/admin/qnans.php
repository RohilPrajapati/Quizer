<?php
require '../config/dbconfig.php';
require '../config/utility.php';
require '../component/user_fetch.php';
session_start();
if (!isset($_SESSION['id'])) {
    redirectAlertMessage('You are not login. Please login first', 'login.html');
}
if (!isset($user['is_admin'])) {
    redirectAlertMessage("You are not admin Please login again", 'login.html');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question & Answer</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php' ?>
        <div class="container">

            <input type="button" onclick="window.location.href='addQuesAns.php'" value="Add Question & Answer" class="btn">
            <h3 class="header">Question and Answer</h2>
                <table>
                    <tr>
                        <th>Serial Number</th>
                        <th>Question</th>
                        <th>option 1</th>
                        <th>Option 2</th>
                        <th>Option 3</th>
                        <th>option 4</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $q_questionans = "SELECT * FROM questions";
                    $result = mysqli_query($conn, $q_questionans);
                    $i = 1;
                    while ($qns = mysqli_fetch_array($result)) {
                        $q_id = $qns['qns_id'];
                        $q_ans = "SELECT * from answers where qns_id = '$q_id'";
                        $result1 = mysqli_query($conn, $q_ans);

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $qns['question']; ?></td>
                            <?php while ($ans = mysqli_fetch_array($result1)) { ?>
                                <td><?php echo $ans['answer']; ?></td>
                            <?php } ?>
                            <td><a class="delete_btn" href="delete_q_ans.php?id=<?= $qns['qns_id'] ?>" onclick="return confirm('Are you sure u want to delete Question and Answer permanently ?')">Delete</a></td>
                        </tr>

                    <?php
                        $i++;
                    }
                    ?>
                </table>

                <h1 class="header">Correct Answer Table</h1>
                <table>
                    <tr>
                        <th>Serial Number</th>
                        <th>Question</th>
                        <th>Correct Answer</th>
                    </tr>
                    <?php
                    include '../config/dbconfig.php';
                    $q_questionans = "SELECT * FROM questions";
                    $result = mysqli_query($conn, $q_questionans);
                    $i = 1;
                    while ($qns = mysqli_fetch_array($result)) {

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $qns['question']; ?></td>
                            <td>
                                <?php
                                $q_ans = 'SELECT answer from answers WHERE ans_id=' . $qns['ans_id'];
                                $result1 = mysqli_query($conn, $q_ans);
                                $ans = mysqli_fetch_array($result1);
                                echo $ans['answer'];
                                // print_r($user);
                                ?>
                            </td>
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