<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="evil"; // Database name
$tbl_name="customers"; // Table name
$tbl_name1="employees"; // Table name
    // Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['uname'];
$mypassword=$_POST['psw'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$result=mysql_query("SELECT * FROM $tbl_name WHERE LoginID='$myusername'  and password='$mypassword'") or die(mysql_error());
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
    {
    $_COOKIE['uname'] = $user_cookie;
    $cusID=mysql_query("SELECT CustomerID FROM customers WHERE LoginID='$myusername'") or die(mysql_error());
    while($row = mysql_fetch_array($cusID)) 
        {
        $cID=$row['CustomerID'];
        }
    $_SESSION['customerid'] = $cID ;
    $_SESSION['Userid'] = $myusername;
    header("location:userpage.php");
    }
else 
    {  
    $result=mysql_query("SELECT * FROM $tbl_name1 WHERE LoginID='$myusername'  and password='$mypassword' and AdminCheck = 1") or die(mysql_error());
    // Mysql_num_row is counting table row
    $count=mysql_num_rows($result);    
    
    if($count==1)
        {
        $adminID=mysql_query("SELECT EmployeeID FROM employees WHERE LoginID='$myusername' and AdminCheck = 1") or die(mysql_error());
        while($row = mysql_fetch_array($adminID)) 
            {
            $adminID=$row['EmployeeID'];
            }
        $_SESSION['adminid'] = $adminID ;
        header("location:adminpage.php");
        }
    
    else 
        {
        $result=mysql_query("SELECT * FROM $tbl_name1 WHERE LoginID='$myusername'  and password='$mypassword' and AdminCheck = 0") or die(mysql_error());
        $count=mysql_num_rows($result);       
        if($count==1)
            {
            $employeeID=mysql_query("SELECT EmployeeID FROM employees WHERE LoginID='$myusername' and AdminCheck = 0") or die(mysql_error());
            while($row = mysql_fetch_array($employeeID)) 
                {
                $employeeID=$row['EmployeeID'];
                }
            $_SESSION['employeeid'] = $employeeID ;       
            header("location:employee.php");
            }
        else 
            {
           echo "<script>alert('Wrong Username or Password');document.location='index.php'</script>";
            }       
        
        }

     }

?>
	

