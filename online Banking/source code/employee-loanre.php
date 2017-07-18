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
<!--SHOW LOANS REQUESTED FROM WHICH CUSTOMER ................................................................................................--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>   <h1>Loans Requested</h1>
</div>
  <?php

   if(isset($_POST['deletepreloan'])){
         $idploan = $_POST['delete_preloan'];  
         $qloan = "DELETE FROM preloan WHERE PreloanID=$idploan"; 
         $loan1 = mysql_query( $qloan, $conn );
      }


  if(isset($_POST['acceptpreloan'])){
         $idploan = $_POST['sanc_rec_id'];
         $loan = "SELECT * FROM preloan WHERE PreloanID =".$idploan;
         $loan1 = mysql_query($loan,$conn);
         $addloan = mysql_fetch_array($loan1,MYSQL_ASSOC);
         $loantype = $addloan["Loantype"];
         $LoanAmount = $addloan["Loanamount"];
         $Interest = $addloan["Interest"];
         $CustomerID = $addloan["CustomerID"];
         $StartDate = date("Y-m-d");
         $CurrentAmount = $addloan["Loanamount"];
         $acceptloan = "INSERT INTO loan (Loantype,Loanamount,Interest,StartDate,CustomerID,CurrentAmount,TotalInterest,LastDate) VALUES ('$loantype','$LoanAmount','$Interest','$StartDate','$CustomerID','$CurrentAmount','0.0','$StartDate')"; 
         mysql_query( $acceptloan, $conn );
         $deletepreloan = "DELETE FROM preloan WHERE PreloanID =".$idploan;
         $loan1 = mysql_query($deletepreloan,$conn );
      }

  $loan = "SELECT p.PreloanID, p.Loantype, p.Interest, p.Loanamount, c.CustomerID, c.Firstname, c.Lastname FROM preloan p,customers c WHERE c.CustomerID = p.CustomerID ORDER BY c.CustomerID";
  $loan1 = mysql_query( $loan, $conn );

  if ($loan1) {
       echo "<div class='col-sm-12'><table id = 'customers'>
  <tr><th>Customer Name</th><th>Customer ID</th><th>PreloanID</th><th>Loan type</th><th>Loan amount</th><th>Sanction</th><th>Delete</th></tr>";
      while($loan2 = mysql_fetch_array($loan1, MYSQL_ASSOC)) {
          $ploan = $loan2["PreloanID"]; 
           echo "<tr><td>".$loan2["Firstname"]." ".$loan2["Lastname"]."</td><td>".$loan2["CustomerID"]."</td><td>".$loan2["PreloanID"]."</td><td>".$loan2["Loantype"]."</td><td>".$loan2["Loanamount"]."</td><td><form id='acceptpreloan' method='post' action=''>
          <input type='hidden' name='sanc_rec_id' value='$ploan'/> 
          <input type='submit' name='acceptpreloan' value='Sanction!'/></form></td><td><form id='deletepreloan' method='post' action=''>
          <input type='hidden' name='delete_preloan' value='$ploan'/> 
          <input type='submit' name='deletepreloan' value='Delete!'/></form></td></tr>";
       }
       echo "</table></div>";
  }
  else {
      echo "No data. You are mysterious.";
  }
  ?>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
  </html>