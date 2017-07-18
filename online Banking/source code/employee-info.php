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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a> 
  <h1>My information</h1>

  <?php
  $sql = "SELECT Employeename, EmailID, Contactnumber FROM employees WHERE EmployeeID =".$_SESSION['employeeid'];
  $result = mysql_query( $sql, $conn );

  if ($result) {
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      echo "<br> name: ". $row["Employeename"]. " - EmailID: ". $row["EmailID"]. "  Contact Number: " . $row["Contactnumber"] . "<br>";
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