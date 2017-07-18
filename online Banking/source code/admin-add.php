
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
<h4>Adding a new employee</h4>
<form id = "add" action = "addemp.php" method = "post">
    <label><b>Full name:</b></label> <br>   
    <input name="Employeename" placeholder="Enter Employee name" type="text" required>
    <br>

    <label><b>Login ID:</b></label><br>
    <input name="LoginID" placeholder="Enter login id" type="text" required>
    <br>

    <label><b>User password:</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <label><b>Email:</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" required>
    <br>
    <label><b>Phone number:</b></label><br>
    <input name="contactnumber" placeholder="Example 123456789" type="number" min="000000000" max="9999999999" required>
    <br><br>
    <input name="submit" value="Submit" type="submit">
</form>
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </div>

</body>
</html>