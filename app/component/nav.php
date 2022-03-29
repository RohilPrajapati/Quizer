<?php
    include 'user_fetch.php';
?>
<div class="nav">
    <img class="nav_logo" src="img/pen.png" alt="logo">
    <ul class="nav_menu">
        <li class="nav_item"><a class="nav_link" href="/">Home</a></li>
        <?php 
        if (isset($_SESSION['id'])){?>
            <li class="nav_item"><a class="nav_link" href="/games.php">Game</a></li>
            <li class="nav_item"><a class="nav_link" href="/profile.php"><?php echo $user['username']  ?></a></li>
        <?php }
        else { ?>
            <li class="nav_item"><a class="nav_link" href="/account.php">Account</a></li>
        <?php } ?>
    </ul>
</div>