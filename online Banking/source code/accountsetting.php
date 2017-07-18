<!DOCTYPE html>
<html>
<head>
<?php
include 'dbconnect.php';
session_start();
include "usersidebar.php";
$customerid=$_SESSION['customerid'];
 ?>
 </head>
 <body>
 <div class="col-sm-12">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<br><br>
<h1> Add a new bank account </h1>
<form action="accountsetting.php" method="post">

<label><b>Add Account:</b></label><br>
<input name="Accountno" placeholder="Enter Accountnumber" type="text"  required>
<br><br>

<label><b>Account Type:</b></label><br>
<select name='at' >
<option value="SAVINGS">Saving</option>
<option value="CURRENT">Current</option>
</select>
<br><br>

<label><b>Branch:</b></label><br>
<select name='bc' >
<option value="GOT">Gotham</option>
<option value="NY">Newyork</option>
<option value="SF">Sanfrans</option>
</select>
<br><br>
<input name="submit" value="Submit" class="btn btn-default" type="submit">
</form>

<?php
 if (isset($_POST['submit'])) 
   {
   $accono=$_POST['Accountno']; 
   $acctype=$_POST['at'];
   $branchcode=$_POST['bc'];
   $AccountinitializeDate = date("Y-m-d");
   $errorcheck=0;

   mysql_select_db('evil');    
   $accse=mysql_query("SELECT Accountnumber FROM accounts") or die(mysql_error());    
    while($getfind = mysql_fetch_array($accse)) 
    {
    if($accono == $getfind['Accountnumber'])
        {
        $errorcheck = 1;
        echo "<script>alert('Account number already exist');document.location='userpage.php'</script>";   
        }
    }    

    if($errorcheck == 0)
        {
        $accsql = "INSERT INTO accounts (Accountnumber,CustomerID,AccountInitializeDate,Accountbalance,Branchcode,Accounttype) VALUES ('$accono','$customerid','$AccountinitializeDate','10000','$branchcode','$acctype ')";
        if ( mysql_query( $accsql, $conn )  === TRUE) 
            {
            echo "<script>alert('Submitted Successfully');document.location='userpage.php'</script>"; ; 
            }
        else 
            {
            die('Could not get data: ' . mysql_error());
            }
        }
   }

 ?>



</div>
</body>
</html>