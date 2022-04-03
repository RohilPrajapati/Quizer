<?php
    require "dbconfig.php";
    function redirectAlertMessage($msg,$url){
        echo "
            <script>
                alert('$msg');;
            </script>
        ";
        header('refresh:0;url= '.$url);
    }
    function fetch_user($id,$conn){
        $q_user = "SELECT * from users  where user_id ='$id'";
        $result = mysqli_query($conn,$q_user);
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_assoc($result);
            return $user;
        }else{
            die("User not found");
        }
        
    }
    function send_mail($to,$title_msg,$msg){
        $to = $to;
		$title = $title_msg;
		$message = $msg;
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:royalprajapati@gmail.com";
        if(mail($to,$title,$message,$headers)) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
    }
?>