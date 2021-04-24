
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    p{
      color:red;
    }
  </style>
  <title>Document</title>
</head>
<body>
  
</body>
</html>

<?php
include("../controller/config.php");
require_once 'model.php';
$fname=$lname=$password=$Cpassword=$phone=$gender=$type=$homeAddress=$email=$birth=$image=$error="";
$fnameFlag=$lnameFlag=$passwordFlag=$phoneFlag=$genderFlag=$typeFlag=$homeAddressFlag=$emailFlag=$birthFlag=$imageFlag=FALSE;
$fnameError=$lnameError=$passError=$phoneError=$genderError=$typeError=$addressError=$emailError=$birthError=$imageError="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
  if(empty($_POST['first_name']) || (!preg_match("/^[a-zA-z ]*$/",$_POST['first_name']))){
      $fnameError="*Please enter your first name";
      $fnameFlag=FALSE;
   }
  else{ 
    $data['fname']=$_POST['first_name'];
     $fnameFlag=TRUE;
   }

  if(empty($_POST['last_name'])||(!preg_match("/^[a-zA-z ]*$/",$_POST['last_name']))){
      $lnameError="*Please enter your last name";
      $lnameFlag=FALSE;
   }
  else{ 
    $data['lname']=$_POST['last_name']; 
    $lnameFlag=TRUE;
   }

  if(empty($_POST['email'])){
    $emailError="*Please enter your email";
    $emailFlag=FALSE;
  }
  else {
     
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
     $emailError = "*Invalid email format";
     $emailFlag=FALSE;
    }
    else{
    $data['email']=$_POST['email'];
    $emailFlag=TRUE;
    }
  }

  if(empty($_POST['password']) || empty($_POST['Cpassword'])){
    $passError="*Please enter your password and confirm password";
    $passwordFlag=FALSE;
    }
  else{
    if($_POST['password'] == $_POST['Cpassword']){
      $data['password']=$_POST['password'];
      $passwordFlag=TRUE;
    }
    else{
        $passError="*Password and confirm password does not match";
        $passwordFlag=FALSE;
      } 
  }

  if(empty($_POST['phone'])){
      $phoneError="*Please enter your phone number";
      $phoneFlag=FALSE;
    }
  else{
      $data['phone']=$_POST['phone'];
      $phoneFlag = TRUE;
    }
  if(empty($_POST['gender'])){
      $genderError="*Please select your gender";
      $genderFlag=FALSE;
    }
  else{
      $data['gender']=$_POST['gender'];
      $genderFlag=TRUE;
      }  

  if(empty($_POST['address'])){
       $addressError="*Please fill up the address";
       $homeAddressFlag = FALSE;
    }
  else{
    $data['address']=$_POST['address'];
    $homeAddressFlag = TRUE;
  } 
}  

if (isset($_POST['submit'])) {

      if($fnameFlag && $lnameFlag && $passwordFlag && $phoneFlag && $genderFlag && $homeAddressFlag && $emailFlag){
          $sql = "select email from buyer where email='".$data['email']."'";
          $result = mysqli_query($db,$sql) or die( mysqli_error($db));
          $count = mysqli_num_rows($result);
          if($count>0){
              echo '<script>alert("Account already exist with this email")</script>';  
          }
          else{
              if(addUser($data)){
                echo '<script>alert("User entry successful. Welcome to ABC.com")</script>';
              }
          }
        }
      else{
          echo nl2br("\n".$fnameError."\n".$lnameError."\n".$passError."\n".$phoneError."\n".$genderError."\n".$addressError."\n".$emailError);
        }
    }  

?>