<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/dashboard2.css">
</head>
<body>
    <?php include 'combine.php';?>

    <div class="dashboard">
    <?php 

    if (isset($_SESSION['login_user'])) {
    echo "<h4> Assalamualaikum, <br> Mr. ".$_SESSION['login_user'].",<br> Welcome to ABC.COM"."</h4>";

    }
    else{
    $msg="error";
    header("location:login.php");
    // echo "<script>location.href='login.php'</script>";
    }

    ?>
    </div>
    <?php include 'footer.html';?>
</body>
</html>