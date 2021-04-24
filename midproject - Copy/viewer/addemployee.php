<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/addemp.css">
    <title>Document</title>
</head>
<body>
<?php include 'admin.php';?>
<?php include('../controller/createEmployee.php');?>

<form action="../controller/createEmployee.php" method="post" enctype="multipart/form-data">   
                    <div class="add">
                        <div class="info">
                    <h1>Add employee</h1>
                    
                    <label for="userid">UserID :</label>  
                    <input type="text" id="userid" name="userid"><br/>
                    <label for="name">Name  :</label>  
                     <input type="text" id="name" name="name">
                     <span class="error">*<?php echo $nameErr; ?></span>
                     <br/>  
                     <label for="email">E-mail :</label>  
                     <input type="text" id="email" name="email">
                     <span class="error">*<?php echo $emailErr;?></span>
                     <br/>  
                    
                     <label for="pass">Password:</label>  
                     <input type="text" id="pass" name="pass">
                     <span class="error">*<?php echo $passErr;?></span>
                     <br />

                    
                    <label>Gender:</label>
                    <input type="radio" name="gender" value="male"><label>Male</label>
                    <input type="radio" name="gender" value="female"><label>Female</label>
                    <input type="radio" name="gender" value="other"><label>Other</label>
                    <span class="error">*<?php echo $genderErr;?></span>
                    <br>
                    
                    <br>
                    
                    <label for="category">Choose a category:</label>
                    <select name="category" id="category">
                    <option value="admin">admin</option>
                    <option value="seller">seller</option>
                    <option value="manager">Manager</option>
                    <span class="error">*</span><?php echo $categoryErr;?>
                    </select>
                    <br>
                    <br>
                    <label>Date Of Birth :</label>
                    <input type="date" name="dob">
                    <span class="error">*<?php echo $dobErr;?></span>
                    <br>
                    <br>
                    <label>Hire Date :</label>
                    <input type="date" name="hiredate">
                    <span class="error">*<?php echo $hireErr;?></span>
                    <br>
                    <br>
                    <label>Profile picture:</label>
                    <input type="file" name="image" id="image"><br><br>
                    <br>
                    
                     <input class="btn" type="submit" name="submit" value="Append"><br /> 
                     
                </form> 
</div>         
</div>  
</body>
</html>