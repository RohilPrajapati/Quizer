<?php
    session_start();
    
    if (isset($_SESSION['id'])){
        
?>
    <div class="msg">
        <form class="msg_form" action="component/insert_feedback.php" method="post">
            <h1 class="msg_head">Feedback Message</h1>
            <input type="text" name="title" class="msg_title" placeholder="Title"><br>
            <textarea name="message" id="" class="msg_desc" placeholder="Type your message here ..."></textarea><br>
            <input class="msg_btn" type="submit" value="Submit">
        </form>
    </div>
<?php
    }
?>