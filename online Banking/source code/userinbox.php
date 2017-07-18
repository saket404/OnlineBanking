<!DOCTYPE html>
<?php include "usersidebar.php" ?>
<html>
<title>Mail</title>
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
<div class="col-sm-12">
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) 
    {
    die('Could not connect: ' . mysql_error());
    }
session_start();
$customerid=$_SESSION['customerid'];

mysql_select_db('evil');
$email="SELECT Subject,Message,m.CustomerID,m.EmployeeID,c.Firstname, c.Lastname, e.Employeename FROM mail m,customers c,employees e  WHERE m.CustomerID='$customerid'AND c.CustomerID = m.CustomerID AND e.EmployeeID = m.EmployeeID AND sendtype =1 " ;
$retval = mysql_query( $email, $conn );
    if(! $retval ) 
        {
        die('Could not get data: ' . mysql_error());
        }
  ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <br><br>
    <h1> Inbox </h1>
    <table id = "customers">
 <thead>
 	<tr>
 		<th>Employeename</th>
 		<th>Name</th>
        <th>Subject</th>
 		<th>Message</th>
 	</tr>
 </thead>
 <tbody>
    <?php 
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
        {
       echo "<tr>
			<td>from :{$row['Employeename']}</td>
			<td>To :{$row['Firstname']}".$row["Lastname"]."</td>
			<td>{$row['Subject']}</td>
            <td><pre>{$row['Message']}</pre></td>
		  </tr>\n";
        }
?>
</tbody>
</table>


</body>
</div>
</html>