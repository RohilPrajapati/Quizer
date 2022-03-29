<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizer</title>
    <link rel="stylesheet" href="css/homestyle.css">
    <script src="js/main.js"></script>
</head>
<body>
    <?php
        include "component/nav.php";
    ?>
    <div class="container">
        <div class="first_home_row">
            <img class="home_page_img" src="img/books.png" alt="books">
            <div class="home_text">
                <h1 class="home_head">Quizer</h1>
                <p class="home_desc">
                    Quizer is web base Game where user can play game. To get started please Register and start playing. Hope you would like this game and have fun.
                </p>
                <?php
                session_start();
                if (isset($_SESSION['id'])){?>
                    <a class="home_register" href="games.php">Play Game</a>
                <?php
                }else{?>
                    <a class="home_register" href="account.php">Register To Play</a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="second_home_row">
            <div class="home_text">
                <h1 class="home_head">Let's get started</h1>
                <p class="home_desc">
                    Enjoy learning and have the knowledge
                </p>
                <a class="home_register" href="account.php">Register</a>
            </div>
            <img class="home_page_img" src="img/pen.png" alt="pen">
        </div>
    </div>
    <?php
        include 'component/feedback.php';
    ?>
</body>
</html>