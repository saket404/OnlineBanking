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


<!--SHOW ACCOUNTS LINKED TO WHICH CUSTOMER REGISTERED TO THE BANK ................................................................................................-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a> 
<br>
<h1>Transaction Data</h1>
<br>
<table id = "customers">
 <thead>
 	<tr>
        <th>Transaction ID</th>
 		<th>Transaction Date</th>
 		<th>Payment Date</th>
        <th>Sender Acc</th>
        <th>Receiver Acc</th>
 		<th>Amount</th>
 	</tr>
 </thead>
 <tbody>
<?php  
   $sql2 = "SELECT t2.TransactionID,t2.TransactionDate,t2.PaymentDate,t1.Accountnumber AS sender,t1.CustomerOtherID AS sender1,t2.Accountnumber AS receiver,t2.CustomerOtherID AS receiver1,t2.Amount FROM transaction t1,transaction t2 WHERE t1.TransactionID = t2.TransactionID AND t1.sendtype = 0 AND t2.sendtype = 1";
   mysql_select_db('evil');
   $retval2 = mysql_query( $sql2, $conn );
   
   if(! $retval2 ) {
      die('Could not get data: ' . mysql_error());
   }
   
   
   
   while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) 
   {
      echo "<tr>
            <td>{$row2['TransactionID']}</td>
			<td>{$row2['TransactionDate']}</td>
            <td>{$row2['PaymentDate']}</td>";
            $sendtoacc1 =  $row2["sender"].$row2["sender1"];
            $sendtoacc2 =  $row2["receiver"].$row2["receiver1"];

	 echo	"<td>".$sendtoacc1."</td>
            <td>".$sendtoacc2."</td>
            <td>{$row2['Amount']}</td>
		    </tr>\n";
   }
?>
</tbody>
</table>

<br><br><br><br>
<h3>Highest Transaction Amount and Details</h3>
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




 </div>
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
  </html>