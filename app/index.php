
<?php
     //require connection
     require("includes/connection.php");
     require("includes/session.php");

  confirm_logged_in();
   $session_email=$_SESSION['email'];
   $query="SELECT * FROM budgetusers_tbl WHERE email='$session_email'";
    $result= mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result)){
    	$session_userid=$row['id'];
    	$session_firstname=$row['firstname'];
    	$session_lastname=$row['lastname'];

    }
echo '<center><h2>Welcome'.$session_firstname.''.$session_lastname.'</h2></center>';



?>


<!DOCTYPE html>
<html>
<head>
	<title>form</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-image: url(images/bud.jpg);
  background-repeat: no-repeat;
  background-size: cover;
   color:white; 
   text-align:center;  
">
<?php
if (isset($_POST["btn_add"])) {
  $itemname=$_POST["itemname"];
    $itemcost=$_POST["itemcost"];
    $query="INSERT INTO budgetitem_tbl (itemname,itemcost) VALUES('{$itemname}','{$itemcost}')";
    $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
    header("Location:index.php");
  # code...
}


?>
<div class="container-fluid">
<div class="row">
<div class="col-md-2">
</div>

<div class="col-md-8">
<form action="index.php" name="budget_form" method="POST">
<label>Item name</label>
<input type="text" name="itemname" class="form-control">
<label>Item cost</label>
<input type="text" name="itemcost" class="form-control">
<input type="submit" name="btn_add" class="btn btn-primary" style="width: 100%; margin-top: 10px;">  
</form>

<table>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    color: #fff;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    color: #fff;
}

tr:nth-child(even) {
    /*background-color: #ccc;*/
}
</style>
    <thead>
      <tr>
      <td>itemname</td>
      <td>itemcost</td>
      <td>Action</td></tr>
    </thead>
  
  <tbody>
  <?php
  if (isset($_GET['deleteid'])) {
    $deleteid=$_GET['deleteid'];
      $query="DELETE FROM budgetitem_tbl WHERE id=$deleteid";
       $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
      header("Location:index.php");
   }
   ?>
  <?php
   $query="SELECT * FROM budgetitem_tbl";

   
   
    $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
    while ($row=mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["itemname"]."</td>";
      echo "<td>".$row["itemcost"]."</td>";
      echo '<td> <a href="edit.php?id='.$row['id'].'">Edit</a>
        <a href="index.php? deleteid='.$row['id'].'" onclick="return confirm(\'Delete?\');">Delete</a>
            
</td>';
      echo "</tr>";
      # code...
    }
    


?>
</tbody>
</table>
</div>
<div class="col-md-2">
<?php
echo '<a href ="logout.php">logout</a>';
  ?>
</div>

</div>
</div>

</body>
</html>


