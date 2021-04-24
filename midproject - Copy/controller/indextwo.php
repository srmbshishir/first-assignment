<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/changepass.css">    

    <title>Document</title>
</head>
<body>
<?php
include("config.php");
$currentpass=$newpass=$repass="";
$currentpassErr=$newpassErr=$repassErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["currentpass"])) {
        $currentpassErr = "password is required";
    } 
    else{
        $currentpass = test_input($_POST["currentpass"]);
        if (strlen($currentpass)<8) {
            $currentpassErr = "less than 8 characters";
            $currentpass="";
        }
        else if (!preg_match('/[$%@#]/', $currentpass))
        {
            $currentpassErr = "at least one special character needed";
            $currentpass="";
        }
    }

    if (empty($_POST["newpass"])) {
        $newpassErr = "password is required";
    } 
    else{
        $newpass = test_input($_POST["newpass"]);
        if (strlen($newpass)<8) {
            $newpassErr = "less than 8 characters";
            $newpass="";
        }
        else if (!preg_match('/[$%@#]/', $newpass))
        {
            $newpassErr = "at least one special character needed";
            $newpass="";
        }
        else if(strcmp($newpass,$currentpass)==0){
            $newpassErr = "you entered the old password";
            $newpass="";
        }
    }

    if (empty($_POST["repass"])) {
        $repassErr = "password is required";
    } 
    else{
        $repass = test_input($_POST["repass"]);
        if (strlen($repass)<8) {
            $repassErr = "less than 8 characters";
            $repass="";
        }
        else if (!preg_match('/[$%@#]/', $newpass))
        {
            $repassErr = "at least one special character needed";
            $repass="";
        }
        else if(!strcmp($newpass,$repass)==0){
            $repassErr = "password does not match";
            $repass="";
        } 
    }
    if($repass!=' ' && $currentpass!=' '){
        $sql = "UPDATE employee set password='$repass' where id ={$_SESSION['id']}";
        $result = mysqli_query($db,$sql) or die( mysqli_error($db));
        echo "password updated successfully";
    }
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="pass">
    <div class="info">
    <h1>CHANGE PASSWORD</h1>
    <label for="currentpass">Current Password : </label>
    <input type="text" id="currentpass" name="currentpass">
    <span class="error">*<?php echo $currentpassErr;?></span><br>
    <label for="newpass">New Password : </label>
    <input type="text" id="pass" name="newpass">
    <span class="error">*<?php echo $newpassErr;?></span><br>
    <label for="repass">Re Type Password : </label>
    <input type="text" id="repass" name="repass">
    <span class="error">*<?php echo $repassErr;?></span><br>
    <input class="btn" type="submit" value="Submit">
</div>
</div>
  
    
</body>
</html>