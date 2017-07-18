<?php session_start();?>
<html>
<title>Add a new Payee from External Bank</title>
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


<h1>Add an external payee </h1>
<form method = "post" action = "">
    <?php   $options1 = '';
    $bname=mysql_query("SELECT Bankname FROM otherbank ") or die(mysql_error());
    while($rowb = mysql_fetch_array($bname)) 
    {
        $options1 .="<option>" . $rowb['Bankname'] . "</option>";
    }

    $menus="<p><label>Choose Bank you want to Add a payee</label></p>
           <select name='bankn' id='bankn'>" . $options1 . "</select>";

    echo $menus;
    ?>

    <br><br>
    <label><b>Enter Payee Name:</b></label><br>
    <input name="name" placeholder="Example: John Dubey" type="text" required>
    <br><br>

    <br><br>
    <label><b>Enter Account Number:</b></label><br>
    <input name="acc" placeholder="Example: P1332" type="text" required>
    <br><br>

    <label><b>Account type:</b></label><br>
    <input type="radio" name="accty" value="SAVINGS" required> SAVINGS
    <input type="radio" name="accty" value="CURRENT" required> CURRENT
    <br><br>
    <input name="submit" value="Submit" type="submit">
    </form>


<?php  
    if(isset($_POST['submit']))
    {
        $Payeename = $_POST['name'];
        $Accountnumber = $_POST['acc'];
        $Accounttype = $_POST['accty'];
        $Bankname = $_POST['bankn'];

        $sql = "SELECT Payeename,Accountnumber FROM payee";
        $sql1 = mysql_query($sql,$conn) or die(mysql_error());
        $result = 0;
        if($sql1)
        {
            while($sql2 = mysql_fetch_array($sql1))
            {
             if($sql2["Payeename"] == $Payeename)
             {
             echo "<script>alert('Already Exsists!');document.location='userpage.php'</script>";
             $result = 1;  
             }
             if($sql2["Accountnumber"] == $Accountnumber)
             {
              echo "<script>alert('Already Exsists!');document.location='userpage.php'</script>";
              $result = 1;
             }
            }
        }
        if($result == 0)
        {
            $insert = mysql_query("INSERT INTO payee (Payeename,Accountnumber,Accounttype,Bankname) VALUES ('$Payeename','$Accountnumber','$Accounttype','$Bankname')") or die(mysql_error());
            echo "<script>alert('Added Successfully, Remember the Account Number for Future Transfers.!!');document.location='userpage.php'</script>";
        }


    }

    ?>
</div>
    </html>