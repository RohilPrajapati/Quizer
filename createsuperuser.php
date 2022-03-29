<?php

$conn = mysqli_connect('localhost','root','prajapati','mcq');
if(!$conn){
    die($conn->connect_error);
}

function createsuperuser($conn){
    echo "username : ";
    $username = trim(fgets(STDIN,255));
    echo "email : ";
    $email = trim(fgets(STDIN,255));
    echo "password : ";
    $pass = trim(fgets(STDIN,255));
    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
    // print_r($hash_password);

    $sql = "INSERT INTO users (username, email, password, is_admin) VALUES ('$username', '$email','$hash_password', 1)";
    if(mysqli_query($conn, $sql)) {
        echo "new user was recorder successfully";
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

createsuperuser($conn);
?>