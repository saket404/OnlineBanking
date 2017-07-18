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
</head>
<body>
	 
	<div class="col-sm-12">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
	 <h1>My Information</h1>
<?php
$sql = "SELECT Employeename, EmailID, Contactnumber FROM employees WHERE EmployeeID =".$_SESSION['adminid'];
$result = mysql_query( $sql, $conn );

if ($result) {
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    echo "<br> Name: ". $row["Employeename"]."<br>EmailID: ". $row["EmailID"]. "  <br>Contact Number: " . $row["Contactnumber"] . "<br>";
}
else {
    echo "No data. You are mysterious.";
}
?>
<br><br>



</div >
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>