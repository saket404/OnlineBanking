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
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a> <h1>Accounts in bank Linked with which Customer</h1>


<?php
 if(isset($_POST['delete'])){
         $id = $_POST['delete_rec_id1'];  
         $query = "DELETE FROM accounts WHERE Accountnumber = '$id' "; 
         $result = mysql_query( $query, $conn );
      }

$acc = "SELECT c.Firstname,c.Lastname,c.CustomerID,a.Accountnumber,a.Branchcode,a.Accountbalance,a.AccountInitializeDate,a.Accounttype FROM accounts a,customers c WHERE c.CustomerID = a.CustomerID ORDER BY c.CustomerID";
$acc1 = mysql_query( $acc, $conn );

if ($acc1) {
     echo "<table class='table'><tr><th>Customer Name</th><th>Customer ID</th><th>Account Number</th><th>Account Balance</th><th>Account Initialize Date</th><th>Accounttype</th><th>Branchcode</th><th>Delete</th></tr>";
    while($acc2 = mysql_fetch_array($acc1, MYSQL_ASSOC)) {
        $cid = $acc2["Accountnumber"];
         echo "<tr><td>".$acc2["Firstname"]." ".$acc2["Lastname"]."</td><td>".$acc2["CustomerID"]."</td><td>".$acc2["Accountnumber"]."</td><td>".$acc2["Accountbalance"]."</td><td>".$acc2["AccountInitializeDate"]."</td><td>".$acc2["Accounttype"]."</td><td>".$acc2["Branchcode"]."</td><td><form id='delete' method='post' action=''>
          <input type='hidden' name='delete_rec_id1' value='$cid'/> 
          <input type='submit' name='delete' value='Delete!'/></form></td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
?>

<h1>Customer With Highest Account Balance</h1>
<?php


$sql1 = "SELECT (SELECT Accountnumber FROM accounts WHERE Accountbalance = (SELECT MAX(Accountbalance) FROM accounts)) AS 'AccountNumber',MAX(Accountbalance) AS MaxBalance,accounts.CustomerID,customers.Firstname,customers.Lastname FROM customers,accounts";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {

     echo "<table class='table'><tr><th>Account Number</th><th>Balance Amount ID</th><th>Name</th></tr>";
    while($row = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row["AccountNumber"]." <td>".$row["MaxBalance"]."</td><td>".$row["Firstname"]." ".$row["Lastname"]." </td></tr>";
     }
     echo "</table>";
 }
else {
     echo "Have data. You are mysterious.";
   }
// }
?>
<h1>Number of Accounts Registered With which Branch</h1>
<?php 
$sql1 = "SELECT b.Branchcode ,COUNT(b.Branchcode) AS NUM FROM branch b INNER JOIN accounts a ON a.Branchcode = b.Branchcode GROUP BY b.Branchcode";
$result1 = mysql_query( $sql1, $conn );

if ($result1) {
     echo "<table class='table'><tr><th>Branch Code</th><th>Number Of Account in This Branch</th></tr>";
    while($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
         echo "<tr><td>".$row1["Branchcode"]."</td><td>".$row1["NUM"]."</td></tr>";
     }
     echo "</table>";
}
else {
    echo "No data. You are mysterious.";
}
 ?>


 </div>
  <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
  </html>