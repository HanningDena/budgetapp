<?php
     //require connection
     require("includes/connection.php");
     require("includes/session.php");
     
?>
<?php
if (isset($_POST['login_btn'])) {//start
  //form data
  
    $email=mysqli_escape_string($conn,$_POST['email']);
    $password=md5($_POST['password']);

    $query="SELECT * FROM budgetusers_tbl WHERE email='$email' AND password='$password'";
    $result= mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    if ($row >0) {
      $_SESSION['email']=$email;
      header("location:index.php");
    }
  else{
    header("location:login.php?error_login=true");
  }
   

 
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

<script>
function validateForm() {
   
    var Email = document.forms["login_form"]["email"].value;
    var Password = document.forms["login_form"]["password"].value;
   
 
     if (Email == "") {
        alert("Email must be filled out");
        return false;
    }
     if (Password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    
    return true;
}
</script>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<?php
if (isset($_GET['success'])) {
  # code...

?>

<div class="alert alert-success alert ">
    
    <strong>Success!</strong> 
  </div>
<?php
}
?>
  <?php
if (isset($_GET['error_login'])) {
  # code...

?>
  <div class="alert alert-danger">
  
    <strong>ACCESSED DENIED!</strong> 
  </div>
  <?php
}
?>
<h3>LOGIN</h3>
<form action="login.php" name="login_form" onsubmit="return validateForm()" method="POST">
            <label>Enter Email</label>
            <input type="email" class="form-control" name="email"><br>
            <label>Enter Password</label>
            <input type="password" class="form-control" name="password" ><br>
            
            <input type="submit" name="login_btn" class="btn btn-primary"  style="width: 100%;">
            <h3 style="text-align: center;"><a href="register.php"> CREATE AN ACCOUNT</a></h3>
</form> 
</div>
<div class="col-md-2">
</div> 