<?php
    session_start();
    
    if (isset($_SESSION['id'])){
        
?>
    <div class="msg">
        <form id='feedbackForm' class="msg_form" action="component/insert_feedback.php" method="post" onsubmit="event.preventDefault(); validate_feedback()">
            <h1 class="msg_head">Feedback Message</h1>
            <input type="text" name="title" id="title" class="msg_title" placeholder="Title"><br>
            <div id="error_title" class="feedback_error"></div>
            <textarea name="message" id="msg" class="msg_desc" placeholder="Type your message here ..."></textarea><br>
            <div id="error_msg" class="feedback_error"></div>
            <input class="msg_btn" type="submit" value="Submit">
        </form>
    </div>
<?php
    }
?>