function validateForm() {

    var fname = document.getElementById("first_name").value;
    var lname = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var Cpassword = document.getElementById("Cpassword").value;
    var phone = document.getElementById("phone").value;
    var gender = document.getElementById("gender").value;
    var homeAddress = document.getElementById("address").value;


    if (fname == "" || lname == "" || email == "" || password == "" || Cpassword == "" || phone == "" || gender == "" || homeAddress == "") {
      document.getElementById("allError").innerHTML="*Please enter all the information";
      return false;
    }

  }

  function validateFname()
  {
    var fname = document.getElementById("first_name").value;
    if (fname == "") {
        document.getElementById("fnameError").innerHTML="*Please enter your first name";
        return false;
    }
    else
    {
        if(! /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(fname))
        {
              document.getElementById("fnameError").innerHTML="*Please enter valid first name";
              return false;
        }
        else
        {
            document.getElementById("fnameError").innerHTML="";
            return true;
        }
    }

  }

  function validateLname()
  {
    var lname = document.getElementById("last_name").value;
    if (lname == "") {
        document.getElementById("lnameError").innerHTML="*Please enter your last name";
        return false;
      }
    else
    {
        if(! /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(lname))
        {
            document.getElementById("lnameError").innerHTML="*Please enter valid last name";
            return false;
        }
        else
        {
            document.getElementById("lnameError").innerHTML="";
            return true;
        }
    }

  }

  function validateEmail()
{
    var email = document.getElementById("email").value;
    if (email == "") {
        document.getElementById("emailError").innerHTML="*Please enter your email";
        return false;
    }
    else
    {
        if (! /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+.([a-z]+)(.[a-z]+)?$/.test(email)) {
            document.getElementById("emailError").innerHTML="*invalid email format.";
            return false;
        }
        else
        {
            document.getElementById("emailError").innerHTML="";
            return true;
        }
    }
}

function validatePassword()
{
    var password = document.getElementById("password").value;
    if (password == "") {
        document.getElementById("passError").innerHTML="Please enter your password ";
        return false;
    }
    else
    {
        if (password.length<5) {
        document.getElementById("passError").innerHTML="At least 5 character";
        return false;
        }
        else
        {
            document.getElementById("passError").innerHTML="";
            return true;
        }
    }
}

function validateCpassword()
{
    var password = document.getElementById("password").value;
    var Cpassword = document.getElementById("Cpassword").value;
    if (Cpassword == "") {
        document.getElementById("CpassError").innerHTML="*Please enter your password ";
        return false;
    }
    else
    {
        if(password != Cpassword)
        {
            document.getElementById("CpassError").innerHTML="*Password & confirm password does not match. ";
            return false;
        }
        else
        {
            document.getElementById("CpassError").innerHTML="";
            return true;
        }
    }
}

function validatePhone()
{
    var phone = document.getElementById("phone").value;
    if (phone == "") {
        document.getElementById("phoneError").innerHTML="*Please enter your contact nuumber ";
        return false;
    }
    else
    {
        if (!/^[0-9]+$/.test(phone)) {
            document.getElementById("phoneError").innerHTML="*Phone number can only be numbers ";
            return false;
        }
        else
        {
            document.getElementById("phoneError").innerHTML="";
            return true;
        }
    }
}

function validateAddress()
{

    var homeAddress = document.getElementById("address").value;
    if (homeAddress == "") {
        document.getElementById("addressError").innerHTML="*Please enter your address ";
        return false;
    }
    else
    {
        document.getElementById("addressError").innerHTML="";
        return true;
    }
}

function validate(){
    var input = document.getElementById('ConfirmEmail');
      //if(input.value == ""){
      if(input.value.trim().length === 0){
        input.style.border = "1px solid red";
      }
      else if(validateEmail(input.value)==false){
         input.style.border = "1px solid red";
      }
      else{
         input.style.border = "1px solid black";
      }
}