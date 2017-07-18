<?php include 'employee-sidebar.php'; ?>
<?php
  session_start();
  ?>
  <html>
  <head>
  	<title>Info</title>
  </head>
  <body>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a> <h1>Loan Ongoing</h1>
</div>
  <?php


  $loandetail = "SELECT * FROM loan l,customers c WHERE c.CustomerID = l.CustomerID ORDER BY l.CustomerID";
  $loantable = mysql_query( $loandetail, $conn );

  if ($loantable) {
       echo "<div class ='col-sm-12' ><table id = 'customers'>
  <tr><th>Customer Name</th><th>Customer ID</th><th>Loan ID</th><th>Loantype</th><th>Loan Amount</th><th>Intereset</th><th>Loan Start date</th><th>Last Payment Date</th><th>Current Amount</th><th>Total Interest</th></tr>";
      while($loan3 = mysql_fetch_array($loantable, MYSQL_ASSOC)) { 
           echo "<tr><td>".$loan3["Firstname"]." ".$loan3["Lastname"]."</td><td>".$loan3["CustomerID"]."</td><td>".$loan3["LoanID"]."</td><td>".$loan3["Loantype"]."</td><td>".$loan3["Loanamount"]."</td><td>".$loan3["Interest"]."</td><td>".$loan3["StartDate"]."</td><td>".$loan3["LastDate"]."</td><td>".$loan3["CurrentAmount"]."</td><td>".$loan3["TotalInterest"]."</td></tr>";
       }
       echo "</table>";
  }
  else {
      echo "No data. You are mysterious.";
  }
  ?>
  <br><br>
 <h2> Loan Payments Made </h2>
 <form action = "employee-loanon.php" method="post">
 <?php

 $Euser=mysql_query("SELECT CustomerID FROM loanpayment,loan WHERE loan.LoanID = loanpayment.LoanID") or die(mysql_error());

    while($row = mysql_fetch_array($Euser)) 
    {
    $options ="<option>" . $row['CustomerID'] . "</option>";
    }

    $menu="<p><label>Select CustomerID to look up: </label></p>
       <select name='em' id='em'>
       " . $options . "
       </select><br>";

    echo $menu;
 ?>
<br>
<input name="submit" class="btn btn-default" value="Submit" type="submit">
<br>
</form>


 <?php
if (isset($_POST['submit'])) 
   {
    $check=$_POST['em'];
    echo "<h4> Payments Made By Customer ID: '$check' </h4>";
   
?>
<table id = "customers">
 <thead>
 	<tr>
 		<th>PaymentID</th>
 		<th>Datepay</th>
 		<th>Amount</th>
 		<th>Account Used to Pay</th>
 	</tr>
 </thead>
 <tbody>
<?php
$sql1 = "SELECT PaymentID,Datepay,Amount,Accountpay FROM loanpayment,loan WHERE loan.CustomerID = '$check' AND loan.LoanID = loanpayment.LoanID ORDER BY Datepay";
   mysql_select_db('evil');
  
   $retval1 = mysql_query( $sql1, $conn );
    if(! $retval1 ) {
      die('Could not get data: ' . mysql_error());
   }  
while($row1 = mysql_fetch_array($retval1))
{	
	echo "<tr>
			<td>{$row1['PaymentID']}</td>
			<td>{$row1['Datepay']}</td>
			<td>{$row1['Amount']}</td>
			<td>{$row1['Accountpay']}</td>
		  </tr>\n";
}
   }
   ?>
</tbody>
</table>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

  </div>
  </body>
  </html>