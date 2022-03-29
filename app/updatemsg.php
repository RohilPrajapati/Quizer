<?php
    include_once 'config/dbconfig.php';
    if($_POST){
        // print_r($_POST);
        $fb_id = $_POST['fb_id'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        $user_id = $_POST['user_id'];
        $sql = "UPDATE feedbacks SET title = '$title', message = '$message', user_id = '$user_id' WHERE fb_id = '$fb_id' ";
        if(mysqli_query($conn, $sql)){
            echo "Record updated successfully.";
            mysqli_close($conn);
            header('Location: profile.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if($_GET){
        $id = $_GET['id'];
        $sql = "SELECT * FROM feedbacks WHERE fb_id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $feedbacks = mysqli_fetch_assoc($result);
            }
        } else {
            echo "No records found!!";
            exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Message</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>
<body>
    <?php require_once 'component/nav.php'; ?>
    
    <form class="update_msg_form" action="" method="post">
        <h1>Update Feedback Message</h1>
        <input type="hidden" name="fb_id" value="<?php echo $feedbacks['fb_id'] ?>">
        <!-- <label for="title">Title</label> -->
        <input name = "title" class="msg_title" type="text" value= "<?php echo $feedbacks['title'] ?>"><br>
        <!-- <label for="message">Message</label> -->
        <textarea name="message" class="msg_desc"><?php echo $feedbacks['message'] ?></textarea>
        <input type="hidden"  name="user_id" value="<?php echo $feedbacks['user_id'] ?>"><br>
        <input type="submit" class="msg_btn" value="Update">

    </form>
</body>
</html>