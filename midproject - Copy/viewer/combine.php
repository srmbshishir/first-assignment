<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="h1">  
    <h1 style="text-align:left;">ABC.COM</h1>
    </div>
    <div class="h5">
        <h5>Logged in as     <?php
        session_start();
        echo $_SESSION['login_user'];
    ?>
    </h5>
    </div>
</header>
<div class="nav">
<nav>
    <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="viewprofile.php">View profile</a></li>
    <li><a href="editprofile.php">Edit profile</a></li>
    <li><a href="changepassword.php">Change password</a></li>
    <li><a href="admin.php">Admin work</a></li>
    <li><a href="logout.php">Logout</a></li> 
    </ul>
</nav>
</div>



</body>
</html>