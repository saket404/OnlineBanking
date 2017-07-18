
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
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #000000;
    color: white;
}
</style> 
</head>
<body>
<div class="col-sm-12">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
<h1>Mails From Employee to Customers:</h1>
<?php
$email="SELECT Subject,Message,m.CustomerID,m.EmployeeID,c.Firstname, c.Lastname, e.Employeename FROM mail m,customers c,employees e  WHERE c.CustomerID = m.CustomerID AND e.EmployeeID = m.EmployeeID AND m.sendtype = 1 ORDER BY m.EmployeeID" ;
$retval = mysql_query( $email, $conn );
    if(! $retval ) 
        {
        die('Could not get data: ' . mysql_error());
        }
?>

<table id = "customers">
 <thead>
 	<tr>
 		<th>Employee</th>
 		<th>Customer</th>
        <th>Subject</th>
 		<th>Message</th>
 	</tr>
 </thead>
 <tbody>
    <?php 
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
        {
       echo "<tr>
            <td>From :{$row['Employeename']}</td>
			<td>To :{$row['Firstname']} ".$row["Lastname"]."</td>
			<td>{$row['Subject']}</td>
            <td><pre>{$row['Message']}</pre></td>
		  </tr>\n";
        }
?>
</tbody>
</table>

<!--Mail from customers to employees check-->
<h1>Mails From Customers to Employee:</h1>
<?php
$email="SELECT Subject,Message,m.CustomerID,m.EmployeeID,c.Firstname, c.Lastname, e.Employeename FROM mail m,customers c,employees e  WHERE c.CustomerID = m.CustomerID AND e.EmployeeID = m.EmployeeID AND m.sendtype = 0 ORDER BY m.CustomerID" ;
$retval = mysql_query( $email, $conn );
    if(! $retval ) 
        {
        die('Could not get data: ' . mysql_error());
        }
?>

<table id = "customers">
 <thead>
 	<tr>
        <th>Customer</th>
 		<th>Employee</th>
        <th>Subject</th>
 		<th>Message</th>
 	</tr>
 </thead>
 <tbody>
    <?php 
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
        {
       echo "<tr>
            <td>From :{$row['Firstname']} ".$row["Lastname"]."</td>
            <td>To :{$row['Employeename']}</td>
			<td>{$row['Subject']}</td>
            <td><pre>{$row['Message']}</pre></td>
		  </tr>\n";
        }
?>
</tbody>
</table>







</div>
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>