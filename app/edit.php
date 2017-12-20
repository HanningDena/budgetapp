<?php
$servername = "localhost";
$databasename = "budgetapp_db";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>


<?php
if (isset($_GET['id'])) {
	$selectedid=$_GET['id'];
	
}
	
		
	elseif (isset($_POST['btn_update'])) {
          $id=$_POST['id'];
          $itemname=$_POST['itemname'];
           $itemcost=$_POST['itemcost'];

          $query="UPDATE budgetitem_tbl SET itemname='{$itemname}',
          itemcost='{$itemcost}'

          WHERE id=$id";
          $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
	    header("Location: edit.php");
	}
	else{header("Location: index.php?success=true&$selectedid=id");}
   
      $query="SELECT* FROM budgetitem_tbl WHERE id=$selectedid";
      $result= mysqli_query($conn,$query);
		 while($row=mysqli_fetch_array($result)){
    	$itemname=$row['itemname'];
    	$itemcost=$row['itemcost'];

    }
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body style="background-image: url(images/bud.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  color:white; 
  text-align:center;  
">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
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

<form action="edit.php" method="POST">

		

			<input type="hidden" name="id" class="form-control" value="<?php echo $selectedid;
				
			?>">
			<label>Item name</label><br>
            <input type="text" name="itemname" class="form-control"><br>
            <label>Item cost</label><br>
            <input type="text" name="itemcost" class="form-control"><br><br>
		
			<input type="submit" name="btn_update"  class="form-control" value="UPDATE">
			<input type="submit" name="btn_cancel"  class="form-control" value="CANCEL">
        

		

	</form>
	</div>
	</div>
	</div>