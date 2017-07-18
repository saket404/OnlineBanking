
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	  <?php include 'admin-sidebar.php'; ?>
	  <?php include 'dbconnect.php'; ?>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<title>ADMIN INFO</title>
  <style>
table, th, td {
     border: 1px solid black;
}
</style>  
</head>
<body>
	<div class="col-sm-12">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>

 <h1> Payee </h1>
 <?php 
if(isset($_POST['delete'])){
         $id = $_POST['delete_rec_id1'];  
         $query = "DELETE FROM payee WHERE CustomerOtherID = '$id' "; 
         $result = mysql_query( $query, $conn );
      }

$sql1 = "SELECT * FROM payee";
$result1 = mysql_query( $sql1, $conn );
// <td>".$row1["Accountnumber"]"</td><td>".$row["Accounttype"]"</td><td>".$row["Bankname"]</td>?
if ($result1) {
     echo "<table class='table'><tr><th>Customer Other ID</th><th>Payee Name</th><th>Account Number</th><th>Account Type</th><th>Bank Name</th><th>Delete</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         $cid = $row1["CustomerOtherID"];
         echo "<tr><td>".$row1["CustomerOtherID"]."</td><td>".$row1["Payeename"]."</td><td>".$row1["Accountnumber"]."</td><td>".$row1["Accounttype"]."</td><td>".$row1["Bankname"]."</td><td><form id='delete' method='post' action=''>
          <input type='hidden' name='delete_rec_id1' value='$cid'/> 
          <input type='submit' name='delete' value='Delete!'/></form></td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
 ?>


<h1>Other Bank</h1>
<?php 
$sql1 = "SELECT * FROM otherbank";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {
     echo "<table class='table'><tr><th>Bank name</th><th>Address</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row1["Bankname"]."</td><td>".$row1["Address"]."</td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
 ?>




 <h1>Account Type</h1>
 <?php 
$sql1 = "SELECT * FROM accounttypeother";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {
     echo "<table class='table'><tr><th>Account Type</th><th>Abbreviation</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row1["Accounttype"]."</td><td>".$row1["Abbreviation"]."</td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
 ?>

</div>
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>