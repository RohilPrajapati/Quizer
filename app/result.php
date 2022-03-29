<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>
<body>
    <?php require_once 'component/nav.php'; ?>
    <h1 class="header">Result</h1>
    <table>
        <tr>
            <td>Correct Answer</td>
            <td><?= $marks ?></td>
        </tr>
        <tr>
            <td>Out of 5 you have attempt </td>
            <td><?= $attempt_question ?></td>
        </tr>
    </table>
</body>
</html>
    <!-- echo "Your marks = ".$marks."<br>";
    echo "Out of 5 you have attempt = ".$attempt_question; -->
<?php
    
?>