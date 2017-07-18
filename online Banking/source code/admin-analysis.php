<?php include 'admin-sidebar.php'; ?>
<?php
  session_start();
  ?>
  <html>
  <head>
  	<title>Info</title>
  </head>
  <body>
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <?php include 'dbconnect.php'; ?>
  <br>
  <body>
      <div class="col-sm-12">


<!--SHOW ACCOUNTS LINKED TO WHICH CUSTOMER REGISTERED TO THE BANK ................................................................................................-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
<h4>Customer With Highest Account Balance</h4>
<?php


$sql1 = "SELECT a.Accountnumber,a.Accountbalance ,c.Firstname,c.Lastname  FROM customers c,accounts a WHERE a.CustomerID = c.CustomerID AND a.Accountbalance = (SELECT MAX(Accountbalance) FROM accounts) ORDER BY a.Accountnumber";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {

     echo "<table id = 'customers'><tr><th>Account Number</th><th>Balance Amount ID</th><th>Name</th></tr>";
    while($row = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row["Accountnumber"]." <td>".$row["Accountbalance"]."</td><td>".$row["Firstname"]." ".$row["Lastname"]." </td></tr>";
     }
     echo "</table>";
 }
else {
     echo "Have data. You are mysterious.";
   }
// }
?>
<br><br>
<h4>Customer With Minimum Account Balance</h4>
<?php


$sql1 = "SELECT a.Accountnumber,a.Accountbalance ,c.Firstname,c.Lastname  FROM customers c,accounts a WHERE a.CustomerID = c.CustomerID AND a.Accountbalance = (SELECT MIN(Accountbalance) FROM accounts) ORDER BY a.Accountnumber";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {

     echo "<table id = 'customers'><tr><th>Account Number</th><th>Balance Amount ID</th><th>Name</th></tr>";
    while($row = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row["Accountnumber"]." <td>".$row["Accountbalance"]."</td><td>".$row["Firstname"]." ".$row["Lastname"]." </td></tr>";
     }
     echo "</table>";
 }
else {
     echo "Have data. You are mysterious.";
   }
// }
?>



<br><br>
<h4>Number of Accounts Registered With which Branch</h4>
<?php 
$sql1 = "SELECT b.Branchcode ,COUNT(b.Branchcode) AS NUM FROM branch b INNER JOIN accounts a ON a.Branchcode = b.Branchcode GROUP BY b.Branchcode";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {
     echo "<table id = 'customers'><tr><th>Branch Code</th><th>Number Of Account in This Branch</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row1["Branchcode"]."</td><td>".$row1["NUM"]."</td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
 ?>

<br><br>
<h4>Highest Transaction Amount and Details</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Transaction ID</th>
 		<th>Transaction Date</th>
 		<th>Payment Date</th>
        <th>Account number</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
 		<th>Amount</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT t.TransactionID,t.TransactionDate,t.PaymentDate,t.Accountnumber,c.CustomerID,c.Firstname,c.Lastname,t.Amount FROM transaction t,accounts a,customers c WHERE sendtype = 0 AND t.Accountnumber = a.Accountnumber AND a.CustomerID = c.CustomerID AND t.Amount = (SELECT MAX(Amount) FROM transaction)";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['TransactionID']}</td>
			<td>{$row['TransactionDate']}</td>
            <td>{$row['PaymentDate']}</td>";
            $sendto =  $row["Accountnumber"];
            $sendto1 =  $row["Firstname"]." ".$row["Lastname"];

	 echo	"<td>".$sendto."</td>
            <td>".$row['CustomerID']."</td>
            <td>".$sendto1."</td>
            <td>{$row['Amount']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>Lowest Transaction Amount and Details</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Transaction ID</th>
 		<th>Transaction Date</th>
 		<th>Payment Date</th>
        <th>Account number</th>
        <th>Customer ID</th>
        <th>Customer Name</th>
 		<th>Amount</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT t.TransactionID,t.TransactionDate,t.PaymentDate,t.Accountnumber,c.CustomerID,c.Firstname,c.Lastname,t.Amount FROM transaction t,accounts a,customers c WHERE sendtype = 0 AND t.Accountnumber = a.Accountnumber AND a.CustomerID = c.CustomerID AND t.Amount = (SELECT MIN(Amount) FROM transaction)";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['TransactionID']}</td>
			<td>{$row['TransactionDate']}</td>
            <td>{$row['PaymentDate']}</td>";
            $sendto =  $row["Accountnumber"];
            $sendto1 =  $row["Firstname"]." ".$row["Lastname"];

	 echo	"<td>".$sendto."</td>
            <td>".$row['CustomerID']."</td>
            <td>".$sendto1."</td>
            <td>{$row['Amount']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>Average Amount of Transcation and Number of Transactions</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Average Amount of Transactions</th>
 		<th>Number of Transactions</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT AVG(Amount) AS num,COUNT(TransactionID) AS numberof FROM transaction WHERE sendtype = 0 ";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['num']}</td>
			<td>{$row['numberof']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>


<br><br>
<h4>Number of External payee registered</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Number of external payee registered</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT COUNT(CustomerOtherID) AS other FROM payee";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['other']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>Customer With more than 2 accouts Registered</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Customer ID</th>
 		<th>Customer Name</th>
        <th>Number of Accounts</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT c.CustomerID,c.Firstname,c.Lastname,COUNT(Accountnumber) AS numberacc FROM accounts a,customers c WHERE a.CustomerID = c.CustomerID GROUP BY c.CustomerID";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      if($row['numberacc'] > 2)
      {
      echo "<tr>
            <td>{$row['CustomerID']}</td>
			<td>{$row['Firstname']} {$row['Lastname']}</td>
            <td>{$row['numberacc']}</td>
		    </tr>\n";
      }
   }
?>
</tbody>
</table>


<br><br>
<h4>Number of transactions transfered to external payee and Total Amount</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Number of external payee transferred</th>
        <th>Total Amount </th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT COUNT(TransactionID) AS num,SUM(Amount) as am  FROM transaction WHERE sendtype = 1 AND CustomerOtherID !='NULL'";
   mysql_select_db('evil');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['num']}</td>
            <td>{$row['am']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>


<br><br>
<h4>How many loans for each loan type</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Loan type</th>
        <th>Number of Loans sanctioned </th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT loantype,COUNT(LoanID) AS id FROM loan GROUP BY loantype";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['loantype']}</td>
            <td>{$row['id']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>How many loan Requests for each loan type</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Loan type</th>
        <th>Number of Loans Requests </th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT loantype,COUNT(PreloanID) AS id FROM preloan GROUP BY loantype";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['loantype']}</td>
            <td>{$row['id']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>


<br><br>
<h4>How many mails sent From Employees to Customers</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Number of Mail</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT COUNT(MailID) AS id FROM mail WHERE sendtype = 1";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['id']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>How many mails sent From Customers to Employees</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Number of Mail</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT COUNT(MailID) AS id FROM mail WHERE sendtype = 0";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['id']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>


<br><br>
<h4>How many loan payments made for each Loan</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Loan ID</th>
        <th>Number of Payments</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT LoanID, COUNT(PaymentID) AS id FROM loanpayment GROUP BY LoanID";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row['LoanID']}</td>
            <td>{$row['id']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br>
<h4>Employee has not logged in for atleast a day</h4>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Employee ID</th>
        <th>Employee Name</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql = "SELECT EmployeeID,Employeename,lastlogin FROM employees ORDER BY EmployeeID";
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
   {
    $getlol=$row['lastlogin'];
    date_default_timezone_set('Asia/Bangkok');
    $transfertime = date("Y-m-d H:i:s",time());
    $datediff = (int)abs((strtotime($transfertime) - strtotime($getlol))/(60*60*24));
    if($datediff > 1)
        {
         echo "<tr>
            <td>{$row['EmployeeID']}</td>
            <td>{$row['Employeename']}</td>
		    </tr>\n";
        }
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