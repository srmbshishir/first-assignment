<?php
include('../controller/UserValidation.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
    <script src="../js/UserValidation.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/registration.css">
    <style>
        span{
            color:red;
        }
    </style>
    </head>
    <body>



<?php include '../viewer/header.html'?>
<div class="title">
    <div class="registration">
        <h2>Registration form</h2>
   
        <p id="allError"><?php //echo $allError; ?>
         <table style='width:90%' border='3'>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"> 

        <span>*Required Field</span> <br> <br>            
            <tr>
            <td><label for="first_name">First name : </label></td>
            <td><input type="text" placeholder="First name"  id="first_name" name="first_name" onkeyup="validateFname()" >
            <span>*</span><p id="fnameError"><?php //echo $fnameError; ?></td>
            </tr>

            <tr>
            <td><label for="last_name">Last name : </label></td>
            <td><input type="text" placeholder="Last name"  id="last_name" name="last_name" onkeyup="validateLname()" >
            <span>*</span><p id="lnameError"><?php //echo $lnameError; ?></td>
            </tr>

            <tr>
            <td><label for="password">Password : </label></td>
            <td><input type="password" placeholder="Password" id="password" name="password" onkeyup="validatePassword()" >
            <span>*</span><p id="passError"><?php //echo $passError; ?></td>
            </tr>

            <tr>
            <td><label for="Cpassword">Confirm Password : </label></td>
            <td><input type="password" placeholder="Confirm password" id="Cpassword" name="Cpassword" onkeyup="validateCpassword()" >
            <span>*</span><p id="CpassError"><?php //echo $passError; ?></td>
            </tr> 

            <tr>
            <td><label for="phone">Phone number : </label></td>
            <td><input type="text" placeholder="phone "  id="phone" name="phone" onkeyup="validatePhone()" >
            <span>*</span><p id="phoneError"><?php //echo $phoneError; ?></td>
            </tr>

            <tr>
            <td><label for="gender">Gender : </label></td>
            <td><input type="radio" id="gender" name="gender" value="male">
            <label style="float:left;" for="male">Male</label>
            <input type="radio" name="gender" value="female">
            <label style="float:left;" for="female">Female</label>
            <span>*</span><p id="genderError"><?php //echo $genderError; ?></td>
            </tr>

            <tr>
            <td><label for="address">Address : </label></td>
            <td><input type="text" placeholder="address"  id="address" name="address" onkeyup="validateAddress()"  > 
            <span>*</span><p id="addressError"><?php //echo $addressError; ?></td>
            </tr>

            <tr>
            <td><label for="email">E-mail : </label></td>
            <td><input type="text" placeholder="mymail@gmail.com"  id="email" name="email" onkeyup="validateEmail()" >
            <span>*</span><p id="emailError"><?php //echo $emailError; ?></td>
            </tr>


            </table>

            <br> <br>
                          
            <input class="btn" type="submit" name = "submit" value="REGISTER">
    
        <br> <br>
        </form>
        <br><br>
    </div>
    </div>

<br>

<br><br>
<div class="footer">
<h3> Copyright@</h3>

</div>
    </body>
</html>