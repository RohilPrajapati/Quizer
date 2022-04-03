<?php
require '../config/utility.php';
require '../config/dbconfig.php';
require '../component/user_fetch.php';
if ($_SESSION['id']) {
    if ($user['is_admin']) {
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
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }

                        $results_per_page = 15;

                        $page_first_result = ($page - 1) * $results_per_page;
                        $i = $page_first_result + 1;


                        $q_fetch_score = "SELECT scores.attemptNumQues, scores.marks, users.username FROM scores INNER JOIN users ON scores.user_id=users.user_id order by s_id desc;";
                        $result = mysqli_query($conn, $q_fetch_score);

                        $number_of_result = mysqli_num_rows($result);

                        $number_of_page = ceil($number_of_result / $results_per_page);
                        if ($page > $number_of_page) {
                            redirectAlertMessage("Invalid Page number !", "dashboard.php");
                        } else {
                            $q_paginated_fetch = "SELECT scores.attemptNumQues, scores.marks, users.username FROM scores INNER JOIN users ON scores.user_id=users.user_id order by s_id desc LIMIT " . $page_first_result . ',' . $results_per_page;
                            $result = mysqli_query($conn, $q_paginated_fetch);
                            // print_r($msg)
                            while ($score = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <?= $score['username']; ?>
                                    </td>
                                    <td><?= $score['attemptNumQues']; ?></td>
                                    <td><?= $score['marks']; ?></td>
                                </tr>
                            <?php
                                $i++;
                            } ?>

                    </table>
                <?php
                        }
                ?>
                <div class="pagination_btn_row">
                    <?php

                    if ($number_of_result > $results_per_page) {
                        for ($page = 1; $page <= $number_of_page; $page++) {
                            echo "<a class='pagination_btn' href = 'dashboard.php?page=$page'>$page</a>";
                        }
                    } ?>
                </div>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        redirectAlertMessage("You are not admin Please login again", 'login.html');
    }
} else {
    redirectAlertMessage("You are not login", 'login.html');
}
?>