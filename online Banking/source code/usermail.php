<!DOCTYPE html>
<html>
<title>Mail</title>
<?php include "usersidebar.php" ?>
<div class="col-sm-12">
<?php
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-align-justify" style="font-size:24px"></i></a>
   <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<form class="w3-container" action="usermail.php" method="post">
<?php
$options = '';
mysql_select_db('evil');
$Euser=mysql_query("SELECT Employeename FROM employees") or die(mysql_error());

while($row = mysql_fetch_array($Euser)) 
{
    $options .="<option>" . $row['Employeename'] . "</option>";
}

$menu="<p><label>Choose Employee</label></p>
       <select name='em' id='em'>
       " . $options . "
       </select><br>";

echo $menu;

?> 
 <label><b>Subject:</b></label> <br>
<input name="subject" placeholder="Enter Subject" type="text" required>
<br><br>

<label><b>Comment:</b></label> <br>
<textarea name="comment" id="comment" type="text"></textarea><br />
<br><br>
<input name="submit" value="Submit" type="submit">
<br>
</form>


<?php
         if (isset($_POST['submit'])) 
   {

        $check=$_POST['em'];
        $mcontent=$_POST['comment'];
        $subject=$_POST['subject'];
        $workerID=mysql_query("SELECT EmployeeID FROM employees WHERE Employeename='$check'") or die(mysql_error());
        while($row = mysql_fetch_array($workerID)) 
            {
            $workersID=$row['EmployeeID'];
            }
        
        mysql_close($conn);
        $CreateDate = date("Y-m-d");
        date_default_timezone_set('Asia/Bangkok');
        $mailtime = date("Y-m-d H:i:s",time());
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "evil";

// Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) 
        {
         die("Connection failed: " . $conn->connect_error);
        }      

        $sql = "INSERT INTO mail (Subject, Message,CustomerID,EmployeeID,sendtype,MailDateTime) VALUES ('$subject', '$mcontent','$customerid','$workersID','0','$mailtime')" or die(mysql_error());
       
         if ($conn->query($sql) === TRUE) 
         {
     echo "<script>alert('Mail Sent Successfuly');document.location='userpage.php'</script>";
         } 
        else
         {
         echo "Error: " . $sql . "<br>" . $conn->error;
         }
   }
        ?>





</div>
</body>
</html>