<?php
    require '../config/dbconfig.php';
    require '../config/utility.php';
    require '../component/user_fetch.php';
    session_start();
    if(!isset($_SESSION['id'])){
        redirectAlertMessage('You are not login. Please login first','login.html');
    }
    if(!isset($user['is_admin'])){
        redirectAlertMessage("You are not admin Please login again",'login.html');
    }
    if(isset($_REQUEST['id'])){
        $id= $_REQUEST['id'];
        $q_delete_ans = "DELETE from questions where qns_id = '$id'";
        if(mysqli_query($conn, $q_delete_ans)){
            $q_delete_qn= "DELETE from questions where qns_id = '$id'";
             if(mysqli_query($conn,$q_delete_qn)){
                echo "
                    <script>
                        alert('Question and anser has been delete')
                    </script>
                ";
                header("refresh:0;url=qnans.php");
             }else{
                echo "fail to delete question";
             }
        }else{
            echo "fail to delete answer";
        }
        $conn->close();
    }
?>