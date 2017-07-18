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
  <body><div class="col-sm-12">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a> <h1 >Customers in Bank</h1></div>
  <?php

   if(isset($_POST['delete'])){
         $id = $_POST['delete_rec_id1'];  
         $query = "DELETE FROM customers WHERE CustomerID= '$id'"; 
         $result = mysql_query( $query, $conn );
      }
  $sql = "SELECT * FROM customers";
  $result = mysql_query( $sql, $conn );

  if ($result) {
        echo "<table class='table'><tr><th>Customer Name</th><th>Customer ID</th><th>Login ID(Mail)</th><th>Branch Code</th><th>City</th><th>Account Start Date</th><th>Lastlogin</th><th>Delete</th></tr>";
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $cid = $row["CustomerID"];
         echo "<tr><td>".$row["Firstname"]." ".$row["Lastname"]."</td><td>".$row["CustomerID"]."</td><td>".$row["LoginID"]."</td><td>".$row["Branchcode"]."</td><td>".$row["City"]."</td><td>".$row["AccountinitializeDate"]."</td><td>".$row["Lastlogin"]."</td><td><form id='delete' method='post' action=''>
        <input type='hidden' name='delete_rec_id' value='$cid'/> 
        <input type='submit' name='delete' value='Delete!'/></form></td></tr>";
       }
       echo "</table>";
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
  </div>    
  </body>
  </html>