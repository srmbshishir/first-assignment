<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/editprofile.css">
    <script src="../js/UserValidation.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include 'combine.php';?>
    <div class="edit">
        <div class="info">
    <form method="post">                       
        <h1>Edit Profile<h1>        
            <label>Name :</label>  
            <input type="text" name="name" class="form-control" value= "<?php echo $_SESSION['login_user']; ?>"><br>
            <label>E-mail :</label>  
            <input type="text" name="email" class="form-control" value= "<?php echo $_SESSION['email']; ?>">
            <br>  

            
            <label>Gender :</label> 
            <input type="radio" name="gender" value="male" 
            <?php echo ($_SESSION['gender']== 'male') ?  "checked" : "" ;  ?>><label>Male</label>
            <input type="radio" name="gender" value="female"
            <?php echo ($_SESSION['gender']== 'female') ?  "checked" : "" ;  ?>><label>Female</label>
            <input type="radio" name="gender" value="other"
            <?php echo ($_SESSION['gender']== 'other') ?  "checked" : "" ;  ?>><label>Other</label>
            
            <br>
            
            <label>Date of Birth :</label> 
            <input type="date" name="dob" value= "<?php echo $_SESSION['dob']; ?>">
            
            
            <br>
                    
            <input type="submit" name="update" value="Append" class="btn" /><br /> 
                                
        </form> 
</div> 
</div> 
        <?php 
        
        include("../controller/config.php");
        if (isset($_POST['update'])) {
            
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['gender'] = $_POST['gender'];
            $data['dob'] = $_POST['dob'];
            
            if($data['name']!='' && $data['email']!='' && $data['gender']!='' && $data['dob']!=''){
                $sql = "UPDATE employee set name='".$data['name']."',email='".$data['email']."',gender='".$data['gender']."',dob='".$data['dob']."' where id ={$_SESSION['id']}";
                $result = mysqli_query($db,$sql) or die( mysqli_error($db));
               
                echo '<script>alert("Data updated successfully")</script>';
            }
            else{
                
                echo '<script>alert("Error!Please fill up all fields")</script>';
            }
            
        }
        ?>


    </article>
    <?php include 'footer.html';?>
</body>
</html>