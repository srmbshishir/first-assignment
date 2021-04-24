<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/viewprofile.css">
    <title>Document</title>
</head>
<body>
    <?php include 'combine.php';?>
    <div class="dashboard">
            <h1>Profile</h1>
            <div class="info">
            <?php
            echo nl2br("ID : ".$_SESSION['id']."\n");
            echo nl2br("User Name : ".$_SESSION['login_user']."\n");
            echo nl2br("Email : ".$_SESSION['email']."\n");
            echo nl2br("Date of Birth : ".$_SESSION['dob']."\n");
            echo nl2br("Gender : ".$_SESSION['gender']."\n");
            echo nl2br("Designation :".$_SESSION['designation']."\n");
            ?>
            </div>
           
            <img src="../controller/uploads/<?php echo $_SESSION['pic']; ?>">
            <a href="profilepicture.php">change profile picture</a>
    </div>
    
    <?php include 'footer.html';?>
</body>
</html>