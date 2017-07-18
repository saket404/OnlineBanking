<?php
include 'dbconnect.php';
session_start();
include "usersidebar.php";
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
<label><h1> Loans we offer:</h1></label>
<table id = "customers" >
 <thead>
 	<tr>
 		<th>Loantype</th>
 		<th>Interest</th>
        <th>Maximum Amount</th>
        <th>Minimum Amount</th>
 	</tr>
 </thead>
 <tbody>

<?php
mysql_select_db('evil');
$sql = "SELECT * FROM loantype ";
$retvalue = mysql_query( $sql, $conn );
if(! $retvalue ) 
      {
      die('Could not get data: ' . mysql_error());
      }
 echo "<br>";
while($info = mysql_fetch_array($retvalue, MYSQL_ASSOC)) 
   {
   echo "<tr>
			<td>{$info['Loantype']}</td>
            <td>{$info['Interest1']}</td>
            <td>{$info['MaximumAmount']}</td>
            <td>{$info['MinimumAmount']}</td><br>
         </tr>\n";
   }
?>
</tbody>
</table>
<form action="userloanrequest.php" method="post">
<br>
<label><h1>Loan request form:</h1></label>
<?php
$options = '';
mysql_select_db('evil');
$type=mysql_query("SELECT Loantype FROM loantype") or die(mysql_error());

while($row = mysql_fetch_array($type)) 
    {
    $options .="<option>" . $row['Loantype'] . "</option>";
    }

$menu="<p><label>Select loan type</label></p>
       <select name='types' id='types'>
       " . $options . "
       </select>";

echo $menu;

?>
<br><br>
<label><b>Loan Amount:</b></label><br>
<input name="amt"  placeholder="Example 10000" type="number" required>
<br><br>


<input name="submit" value="Submit" type="submit">
</form>

<?php
         if (isset($_POST['submit'])) 
            {
            $errorcheck = 0;
            $getamt=$_POST['amt'];
            $gettype=$_POST['types'];
            $find=mysql_query("SELECT MaximumAmount,MinimumAmount FROM loantype WHERE Loantype = '$gettype'") or die(mysql_error());
            $find2=mysql_query("SELECT LoanID FROM loan WHERE CustomerID = '$customerid'") or die(mysql_error());
            $num_rows = mysql_num_rows($find2);
            $find3=mysql_query("SELECT PreloanID FROM preloan WHERE CustomerID = '$customerid'") or die(mysql_error());
            $num_rows1 = mysql_num_rows($find3);
            while($getfind = mysql_fetch_array($find)) 
                {
                $check=$getfind['MaximumAmount'];
                $check1=$getfind['MinimumAmount'];
                if($getamt > $check)
                    {
                    $errorcheck = 1;
                    echo "<script>alert('Cannot put amount more than maximum amount loan can provide');document.location='userpage.php'</script>";
                    }
                if($getamt < $check1)
                    {
                    $errorcheck = 1;
                    echo "<script>alert('Cannot put amount less than minimum amount loan can provide');document.location='userpage.php'</script>";                  
                    }
                if($num_rows > 0)
                    {
                    $errorcheck = 1;
                    echo "<script>alert('Cannot request for a loan while on an ongoing loan');document.location='userpage.php'</script>";
                    }
                if($num_rows1 > 0)
                    {
                    $errorcheck = 1;
                    echo "<script>alert('Cannot request for a loan while already request a loan.');document.location='userpage.php'</script>";
                    }
                }
           if($errorcheck==0)
                {
                $getinterest=mysql_query("SELECT Interest1 FROM loantype WHERE Loantype = '$gettype'") or die(mysql_error());
                while($getInterest = mysql_fetch_array($getinterest)) 
                    {
                    $interest=$getInterest['Interest1'];
                    }
                $insertss="INSERT INTO preloan (Loantype,Interest,Loanamount,CustomerID) VALUES ('$gettype','$interest','$getamt','$customerid')" or die(mysql_error());
                $retvalss = mysql_query( $insertss, $conn );
                if(! $retvalss ) 
                    {
                    die('Could not get data: ' . mysql_error());
                    }
                else
                    {
                    echo "<script>alert('Sucessfully sended the requesr');document.location='userpage.php'</script>";
                    } 
                
                
                } 
           }
?>
</div>
