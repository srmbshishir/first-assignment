<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/homeop.css">
    <title>Document</title>
    <script src="../js/UserValidation.js"></script>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
<?php
   include("config.php");
   session_start();
   $emailErr=$passErr="";
   $error=$uname=$pass="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else if (empty($_POST["password"])) {
        $passErr = "password is required";
      }
      else{
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM employee WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) or die( mysqli_error($db));
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
               if(isset($_POST['remember'])){
                  setcookie('email',$_POST['email'],time()+60*60*7);
                  setcookie('password',$_POST['password'],time()+60*60*7);
               }
         $_SESSION['login_user'] = $row['name'];
         $_SESSION['id']=$row['id'];
         $_SESSION['email']=$myusername;
         $_SESSION['dob']=$row['dob'];
         $_SESSION['gender']=$row['gender'];
         $_SESSION['designation']=$row['designation'];
         $_SESSION['hiredate']=$row['hiredate'];
         $_SESSION['pic']=$row['image'];

         echo $_SESSION[login_user];

         if($row['designation']=="admin"){
            header("location:../viewer/dashboard.php");
         }
         else if($row['designation']=="manager"){
            header("location:../viewer/manager.php");
         }
         else if($row['designation']=="seller"){
            header("location:../viewer/seller.php");
         }



      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  }
?>
<html>
   
   
   <body>
      <?php include '../viewer/header.html'?>
      <div class="title">
         <div class="login">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Login</h1>
                  <div class="textbox">
                     <input type="text" id="email" name="email" placeholder="Email id" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; }?>" onkeyup="validateEmail()" >
                     <span>*</span><p id="emailError">
                  </div>
                  <div class="textbox">
                     <input type="password" id="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }?>" onkeyup="validatePassword()" >
                     <span>*</span><p id="passError">
                  </div>
                  <div class="error">
                  <?php echo $error; echo $emailErr; echo $passErr; ?>
                  </div>
                  <br>  
                  <input type="checkbox" id="remember" name="remember" value="1">
                  <label class="checkbox" for="remember">Remember Me</label> <br>
                  <input class="btn" type="submit" value="Sign in" onclick="validate()">
                  
            
                  
                    
             </form>
      </table>
   </div>
   </div>
   </body>
</html>

