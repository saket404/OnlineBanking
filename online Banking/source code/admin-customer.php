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
   <!--SHOW CUSTOMERS REGISTERED TO THE BANK ................................................................................................-->
 
<h1>Customers in Bank</h1>
<?php

 if(isset($_POST['delete'])){
       $id = $_POST['delete_rec_id']; 
       $query = "DELETE FROM customers WHERE CustomerID= '$id' "; 
       $result = mysql_query( $query, $conn );
    }
$sql = "SELECT * FROM customers " ;
$result = mysql_query( $sql, $conn );

if ($result) {
     echo "<table class='table'><tr><th>Customer Name</th><th>Customer ID</th><th>Login ID(Mail)</th><th>Branch Code</th><th>City</th><th>Account Start Date</th><th>Lastlogin</th><th>Delete</th></tr>";
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $cid = $row["CustomerID"];
         echo "<tr><td>".$row["Firstname"]." ".$row["Lastname"]."</td><td>".$row["CustomerID"]."</td><td>".$row["LoginID"]."</td><td>".$row["Branchcode"]."</td><td>".$row["City"]."</td><td>".$row["AccountinitializeDate"]."</td><td>".$row["Lastlogin"]."</td><td><form id='delete' method='post' action=''>
        <input type='hidden' name='delete_rec_id' value='$cid'/> 
        <input type='submit' name='delete' value='Delete!'/></form></td></tr>";
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