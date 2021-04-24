<?php
include 'config.php';
require_once 'model.php';
$hireErr=$idErr=$passErr=$nameErr=$emailErr=$dobErr=$genderErr=$categoryErr="";
$alphas= array_merge(range('a','z'),range('A','Z'));

if(isset($_POST['submit'])){

    //userid validation
    if (empty($_POST["userid"])) {
        $idErr = "Userid is required";
    } 
    else {
        $data['userid']=$_POST['userid'];
    }
    

    //name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else{
          $data['name']=$_POST['name'];
          if (!preg_match("/^[a-zA-Z\s\-]{2,}$/",$data['name'])) {
              $nameErr = "Only letters and white space allowed";
              $data['name']="";
          }
          else if(!in_array($data['name'][0],$alphas)){
              $nameErr = "First letter should be a letter";
              $data['name']="";
          }
      }

    //email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else{
        $data['email']=$_POST['email'];
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $data['email']="";
        }
    }

    //password validation
    if (empty($_POST["pass"])) {
        $passErr = "password is required";
    } 
    else{
        $data['pass']= $_POST['pass'];
        if (strlen($data['pass'])<8) {
            $passErr = "less than 8 characters";
            $data['pass']="";
        }
        else if (!preg_match('/[$%@#]/', $data['pass']))
        {
            $passErr = "at least one special character needed";
            $data['pass']="";
        }
    }
    
    //gender validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } 
    else {
        $data['gender']=$_POST['gender'];
    }
    
    //category validation
    if (empty($_POST["category"])) {
       $categoryErr = "Category is required";
    } 
    else {
        $data['category']=$_POST['category'];
    }
    
    //dob validation
     if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
    }
    else{ 
        $data['dob']=$_POST['dob'];
    }
    
     //hiredate validation
    if (empty($_POST["hiredate"])) {
        $hireErr = "Hiredate is required";
    }
    else{ 
        $data['hiredate']=$_POST['hiredate'];
    }

    //image validation
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $name=basename( $_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        if($name==""){
            echo "image file not chosen";
            $data['image']="";
        }
        else{
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["image"]["size"] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $data['image']="";
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } 
            else{
                $data['image'] =basename($_FILES["image"]["name"]);
            }

        }  
        if($data['image'] != "" && $data['userid'] != "" && $data['name'] != "" && $data['email'] != "" && $data['pass'] != "" && $data['dob'] != "" && $data['hiredate'] != "" && $data['gender'] != "" && $data['category'] != ""){
            $sql = "select email from employee where email='".$data['email']."'";
            $result = mysqli_query($db,$sql) or die( mysqli_error($db));
            $count = mysqli_num_rows($result);
            if($count>0){
                echo '<script>alert("Account already exist with this email")</script>';  
            }
            else{
                if(addEmployee($data)){
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                        
                    }
                    echo '<script>alert("successfully added!!")</script>';
                }

                else{
                    echo '<script>alert("you are not allowed to access this page")</script>';
                }
            }
        }
        else{
            echo nl2br("\n".$hireErr."\n".$idErr."\n".$passErr."\n".$nameErr."\n".$emailErr."\n".$dobErr."\n".$genderErr."\n".$categoryErr."\n");
        }
    }
} 


?>