<?php
session_start();

session_destroy();
setcookie('userName',$_POST['userName'],time()-1);

header("Location: login.php"); // Redirecting To Home Page

?>