<?php
require '../config/dbconfig.php';
require '../config/utility.php';
require '../component/user_fetch.php';
session_start();
if (!$_SESSION['id']) {
    redirectAlertMessage('You are not login. Please login first', 'login.html');
}
if (!$user['is_admin']) {
    redirectAlertMessage("You are not admin Please login again", 'login.html');
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
            <input type="button" onclick="window.location.href='addUser.php'" value="Add Admin User " class="btn">
            <?php

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $results_per_page = 10;

            $page_first_result = ($page - 1) * $results_per_page;
            $i = $page_first_result + 1;

            $q_user = "SELECT * FROM users order by user_id desc";
            $result = mysqli_query($conn, $q_user);
            if (mysqli_num_rows($result) > 0) {
                $number_of_result = mysqli_num_rows($result);

                $number_of_page = ceil($number_of_result / $results_per_page);
                if ($page > $number_of_page) {
                    redirectAlertMessage("Invalid Page number !", "users.php");
                } else {
                    $q_paginated_fetch = "SELECT * FROM users order by user_id desc LIMIT " . $page_first_result . ',' . $results_per_page;
                    $result = mysqli_query($conn, $q_paginated_fetch);
                    // print_r($msg)
            ?>
                    <h3 class="header">User List</h2>
                        <table>
                            <tr>
                                <th>Serial Number</th>
                                <th>username</th>
                                <th>email</th>
                                <th>is_admin</th>
                                <th>is_player</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            while ($user = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['is_admin']; ?></td>
                                    <td><?= $user['is_player']; ?></td>
                                    <td>
                                    <?php
                                    if($user['is_admin']){
                                ?>
                                    <a class="delete_btn" href="updateAdminStatus.php/?id=<?= $user['user_id'] ?> " onclick="return confirm('Are you sure u want to remove admin ?')">Remove Admin</a>
                                <?php
                                    }else{
                                        ?>
                                        <a class="enable_btn" href="updateAdminStatus.php/?id=<?= $user['user_id'] ?>" onclick="return confirm('Are you sure u want to make user admin ?');">Make Admin</a>
                                        <?php
                                    }
                                ?>
                                    </td>
                                </tr>

                            <?php
                                $i++;
                            }   


                            ?>
                        </table>
                <?php
                }
            }

                ?>
                <div class="pagination_btn_row">
                    <?php

                    if ($number_of_result > $results_per_page) {
                        for ($page = 1; $page <= $number_of_page; $page++) {
                            echo "<a class='pagination_btn' href = 'user.php?page=$page'>$page</a>";
                        }
                    } ?>
                </div>
        </div>
</body>

</html>