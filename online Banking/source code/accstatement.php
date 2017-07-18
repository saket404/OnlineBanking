<!DOCTYPE html>
<html>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Account Statement</title>
<?php
include "usersidebar.php";
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
?>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<br><br>
<h1> Account Statement </h1></div>
<div class = "col-sm-3">
<form action="accstatement.php" method="post">
<br>
<?php
$options = '';
mysql_select_db('evil');
$filter=mysql_query("SELECT Accountnumber FROM accounts WHERE CustomerID='$customerid'") or die(mysql_error());

while($row = mysql_fetch_array($filter)) 
{
    $options .="<option>" . $row['Accountnumber'] . "</option>";
    $hello=$row['Accountnumber'];
}

$menu="<p><label>Choose Bank Account</label></p>
       <select name='filter' id='filter'>
       " . $options . "
       </select>";

echo $menu;
?>
<br>
<label><b>Select starting date</b></label><br>
<input type="date" class="form-control" name="bday" >
<br><br>

<label><b>Select last date</b></label><br>
<input type="date" class="form-control" name="lastday" >
<br><br>


<input name="submit" class="btn btn-default" value="Submit" type="submit">
</div><div class="col-sm-12">
</form>
<!--Current Account Balance-->
<br><br>
<h4><b> Account Balance info </b></h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
 		<th>Account number</th>
 		<th>Account status</th>
        <th>Account Initialize Date</th>
        <th>Account type</th>
 		<th>Account Balance</th>
 	</tr>
 </thead>
 <tbody>


<?php 
   if (isset($_POST['submit'])) 
   {
   $hello = $_POST['filter'];
   $sql1 = "SELECT Accountnumber,Accountstatus,AccountInitializeDate,Accounttype,Accountbalance FROM accounts WHERE Accountnumber='$hello'";
   mysql_select_db('evil');
   $retval1 = mysql_query( $sql1, $conn );
   
   if(! $retval1 ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row1 = mysql_fetch_array($retval1, MYSQL_ASSOC)) 
   {
      echo "<tr>
			<td>{$row1['Accountnumber']}</td>
            <td>{$row1['Accountstatus']}</td>
            <td>{$row1['AccountInitializeDate']}</td>
            <td>{$row1['Accounttype']}</td>
            <td>{$row1['Accountbalance']}</td>
		    </tr>\n";
   }
   
   
   }
   
?>
</tbody>
</table>




<br>
<h4><b> Transaction History </b></h4>
<!--FUNDS TRANSFERRED TO OTHER ACOUNT FROM USER ACCOUNT-->
<br>
<h5> Fund Transferred: </h5>
<br>
<table id = "customers">
 <thead>
 	<tr>
 		<th>Transaction Date</th>
 		<th>Payment Date</th>
        <th>Transferred To</th>
 		<th>Amount</th>
 	</tr>
 </thead>
 <tbody>


<?php 
   if (isset($_POST['submit'])) 
   {
   $hello = $_POST['filter'];
   $getfirstd=$_POST['bday'];
   $getsecond= $_POST['lastday'];
   if($getfirstd==NULL && $getsecond==NULL)
        {
         $sql = "SELECT TransactionID,TransactionDate,Paymentdate,Accountnumber,CustomerOtherID,Amount FROM transaction WHERE Accountnumber='$hello' AND sendtype = 0 ";
         mysql_select_db('evil');
         $retval = mysql_query( $sql, $conn );
   
        if(! $retval )
             {
             die('Could not get data: ' . mysql_error());
             }
        }
   else 
        {
         $sql = "SELECT TransactionID,TransactionDate,Paymentdate,Accountnumber,CustomerOtherID,Amount FROM transaction WHERE Accountnumber='$hello' AND sendtype = 0 AND TransactionDate between '$getfirstd' and '$getsecond'";
         mysql_select_db('evil');
         $retval = mysql_query( $sql, $conn );
   
        if(! $retval )
             {
             die('Could not get data: ' . mysql_error());
             }
        }
   
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
			<td>{$row['TransactionDate']}</td>
            <td>{$row['Paymentdate']}</td>";
            $sendto = "SELECT Accountnumber,CustomerOtherID FROM transaction WHERE TransactionID =".$row["TransactionID"]." AND sendtype = 1";
            $sendto1 = mysql_query($sendto,$conn);
            if($sendto1){ 
            $sendto2 = mysql_fetch_array($sendto1,MYSQL_ASSOC);
            $sendtoacc =  $sendto2["CustomerOtherID"].$sendto2["Accountnumber"];
            }
            else{echo "No data. You are mysterious.";}
	 echo	"<td>".$sendtoacc."</td>
            <td>{$row['Amount']}</td>
		    </tr>\n";
   }
   
   }
?>
</tbody>
</table>
<br>
<!--FUNDS RECIEVED FROM OTHER ACOUNT INTO USER ACCOUNT-->
<h5> Fund Recieved: </h5>
<br>
<table id = "customers">
 <thead>
 	<tr>
 		<th>Transaction Date</th>
 		<th>Payment Date</th>
        <th>Recieved From</th>
 		<th>Amount</th>
 	</tr>
 </thead>
 <tbody>


<?php 
   if (isset($_POST['submit'])) 
   {
   $getfirstd=$_POST['bday'];
   $getsecond= $_POST['lastday'];
   $hello = $_POST['filter'];  
   
   
    if($getfirstd==NULL && $getsecond==NULL)
        {
         $sql2 = "SELECT TransactionID,TransactionDate,Paymentdate,Accountnumber,CustomerOtherID,Amount FROM transaction WHERE Accountnumber='$hello' AND sendtype = 1 ";
         mysql_select_db('evil');
         $retval2 = mysql_query( $sql2, $conn );
   
         if(! $retval2 ) 
            {
            die('Could not get data: ' . mysql_error());
            }
        }
   else 
        {
          $sql2 = "SELECT TransactionID,TransactionDate,Paymentdate,Accountnumber,CustomerOtherID,Amount FROM transaction WHERE Accountnumber='$hello' AND sendtype = 1  AND TransactionDate between '$getfirstd' and '$getsecond'";
         mysql_select_db('evil');
         $retval2 = mysql_query( $sql2, $conn );
   
         if(! $retval2 ) 
            {
            die('Could not get data: ' . mysql_error());
            }
        }
   
   
   while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) 
   {
      echo "<tr>
			<td>{$row2['TransactionDate']}</td>
            <td>{$row2['Paymentdate']}</td>";
            $sendtoo = "SELECT Accountnumber,CustomerOtherID FROM transaction WHERE TransactionID =".$row2["TransactionID"]." AND sendtype = 0";
            $sendtoo1 = mysql_query($sendtoo,$conn);
            if($sendtoo1){ 
            $sendtoo2 = mysql_fetch_array($sendtoo1,MYSQL_ASSOC);
            $sendtoacc1 =  $sendtoo2["CustomerOtherID"].$sendtoo2["Accountnumber"];
            }
            else{echo "No data. You are mysterious.";}
	 echo	"<td>".$sendtoacc1."</td>
            <td>{$row2['Amount']}</td>
		    </tr>\n";
   }
   mysql_close($conn);
   }
?>
</tbody>
</table>



     




</body>
</div>
</html>