<?php
     //require connection
     require("includes/connection.php");
?>
<?php
//check if the form is submitted
if (isset($_POST['register_btn'])) {//start
	//form data
	$fname=ucfirst(mysqli_escape_string($conn,$_POST['fname']));
    $lname=ucfirst(mysqli_escape_string($conn,$_POST['lname']));
    $email=mysqli_escape_string($conn,$_POST['email']);
    $password=md5($_POST['password']);

    $query="INSERT INTO budgetusers_tbl(firstname,lastname,email,password) VALUES('{$fname}','{$lname}','{$email}','{$password}')";
    $result= mysqli_query($conn,$query);
    header("location:login.php?success=true");

 
	# code...
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<body style="background-image: url(images/bud.jpg);
  background-repeat: no-repeat;
  background-size: cover;
   color:white; 
   text-align:center;  
">
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
</div>

<div class="col-md-8">
<h3>REGISTRATION FORM</h3>

<script>
function validateForm() {
    var Fname = document.forms["register_form"]["fname"].value;
    var Lname = document.forms["register_form"]["lname"].value;
    var Email = document.forms["register_form"]["email"].value;
    var Password = document.forms["register_form"]["password"].value;
    var Cpassword = document.forms["register_form"]["cpassword"].value;
    if (Fname == "") {
        alert("Firstname must be filled out");
        return false;
    }
     if (Lname == "") {
        alert("Lastname must be filled out");
        return false;
    }
     if (Email == "") {
        alert("Email must be filled out");
        return false;
    }
     if (Password == "") {
        alert("Password must be filled out");
        return false;
    }
      if (Cpassword == "") {
        alert("cpassword must be filled out");
        return false;
    }
     if (Password != Cpassword) {
        alert(" Password do not match");
        return false;
    }
    return true;
}
</script>

<form action="register.php" name="register_form" onsubmit="return validateForm()" method="POST">
            <label>Enter first Name</label>
            <input type="text" class="form-control" name="fname" ><br>
            <label>Enter last Name</label>
            <input type="text" class="form-control" name="lname" ><br>
            <label>Enter Email</label>
            <input type="email" class="form-control" name="email"><br>
            <label>Enter Password</label>
            <input type="password" class="form-control" name="password" ><br>
            <label>Confirm password</label>
            <input type="password" class="form-control" name="cpassword" ><br>
            <input type="submit" name="register_btn" class="btn btn-primary"  style="width: 100%;">
</form>  
</div>            
<div class="col-md-2">
</div>
</div>
</div>





</body>
</html>