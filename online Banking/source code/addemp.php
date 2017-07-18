<?php
include("dbconnect.php");
?>



<?php

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


$EmployeeName = $_POST["Employeename"];
$LoginID = $_POST["LoginID"];
$Password = $_POST["psw"];
// $addr = $_POST["Address"];
$EmailID = $_POST["email"];
$Contactnumber = $_POST["contactnumber"];
$CreateDate = date("Y-m-d");
date_default_timezone_set('Asia/Bangkok');
$lastlogin = date("Y-m-d H:i:s",time());

$emp = "INSERT INTO employees (Employeename, LoginID, Password, EmailID, Contactnumber, CreateDate, lastlogin, AdminCheck) VALUES ('$EmployeeName', '$LoginID','$Password','$EmailID','$Contactnumber','$CreateDate','$lastlogin','0')";

if (mysql_query( $emp, $conn ) === TRUE) 
    {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header( "refresh:0; admin-employee.php" ); //wait for 5 seconds before redirecting

    
    }
else 
    {
    echo "<script type='text/javascript'>alert('submitted failed!')</script>";
    header( "refresh:0; admin-employee.php" ); //wait for 5 seconds before redirecting
    }
    
    



?>

