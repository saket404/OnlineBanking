<?php
include("dbconnect.php");
date_default_timezone_set('Asia/Bangkok');
session_start();
$lastlogin1 = date("Y-m-d H:i:s",time());
$adminid=$_SESSION['adminid'];
$sql ="UPDATE employees SET lastlogin = '$lastlogin1' WHERE EmployeeID = '$adminid'";
$query =  mysql_query($sql,$conn) or die(mysql_error());



//remove all session variables
session_unset(); 

//destroy the session 
session_destroy(); 
header("Location:index.php");
die();
?>



 