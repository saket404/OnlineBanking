<?php session_start();?>
<html>
<title>About</title>
<?php include 'dbconnect.php';  
    include "usersidebar.php"; 
 ?>
 <div class="col-sm-12">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<h1>About</h1>
 </div>