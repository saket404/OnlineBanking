
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
<h1>Employees in Bank</h1>
<h4>Employee List</h4>
<?php
if(isset($_POST['delete1'])){
       $id = $_POST['delete_rec_id1']; 
       $query1 = "DELETE FROM employees WHERE EmployeeID=$id"; 
       $result1 = mysql_query( $query1, $conn );
    }

$sql1 = "SELECT * FROM employees";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {
     echo "<table class='table'><tr><th>Employee Name</th><th>Employee ID</th><th>EmailID</th><th>Contact Number</th><th>Create Date</th><th>Last Login</th><th>Delete</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
        if($row1['EmployeeID'] != $_SESSION['adminid'])
        {
        $cid1 = $row1["EmployeeID"];
         echo "<tr><td>".$row1["Employeename"]."</td><td>".$row1["EmployeeID"]."</td><td>".$row1["EmailID"]."</td><td>".$row1["Contactnumber"]."</td><td>".$row1["CreateDate"]."</td><td>".$row1["lastlogin"]."</td><td><form id='delete1' method='post' action=''>
        <input type='hidden' name='delete_rec_id1' value='$cid1'/> 
        <input type='submit' name='delete1' value='Delete!'/></form></td></tr>";
        }
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