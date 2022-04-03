<?php
    $conn = mysqli_connect('localhost','mcq_rohil','password','mcq');
    if($conn->connect_error){
        die('connection error'. $conn->connect_error);
    }
    // echo "sucess"
?>