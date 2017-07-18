<!DOCTYPE html>
<html>
<head>
    
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
      
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #000000;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }
  .jumbotron {
      background-color: #000000;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .container-fluid2 {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e;
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #000000;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  
  
  </style>
  
  
</head>

<body style="background-color:black"> 

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class = "navbar-brand-left" href="index.php"><img src = "img/e.png" width="50" height="50"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php#Login">LOGIN</a></li>
        <li><a href="index.php#about">ABOUT</a></li>
        <li><a href="index.php#services">SERVICES</a></li>
        <li><a href="index.php#branch">BRANCHES</a></li>
        <li><a href="index.php#CustomerReviews">FEEDBACK</a></li>
        <li><a href="index.php#contact">CONTACT</a></li>
        <li><a href="register.php">REGISTER</a></li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Evil Bank</h1>
  <p>Your money is safe with us.</p>
  <img src="img/bat.jpg" class="img-rounded" alt="Cinque Terre" width="800" height="236">
</div>
 


<div class="container-fluid" style ="background-color: black" >
  <div class = "row"> 
    <div class = "col-md-4"></div>
    <div class = "col-md-4" style ="background-color: white">
<h2>Register For a new Evil-Account</h2>
<form class="form-inline" action="registertoDB.php" method="post">
    
     
<label><b>First name:</b></label> <br>
<input name="firstname" class="form-control" placeholder="Enter Firstname" type="text" required>
<br><br>

<label><b>Last name:</b></label><br>
<input name="lastname" class="form-control" placeholder="Lastname" type="text" required>
<br><br>

<label><b>Enter a date of birth (should be more than 2000-01-01:)</b></label><br>
<input type="date" class="form-control" name="bday">
<br><br>


<label><b>Gender:</b></label><br>
<input type="radio" name="gender" value="male" required> Male
<input type="radio" name="gender" value="female" required> Female
<br><br>

<label><b>Phone number:</b></label><br>
<input name="phoneno" class="form-control" placeholder="Example 123456789" type="number" required>
<br><br>

<label><b>City:</b></label> <br>
<input name="city" class="form-control" placeholder="Enter city name" type="text" required>
<br><br>

<label><b>State:</b></label> <br>
<input name="state" class="form-control" placeholder="Enter first name" type="text" required>
<br><br>

<label><b>Country:</b></label> <br>
<input name="country" class="form-control" placeholder="Enter country name" type="text" required>
<br><br>

<label><b>Branch:</b></label><br>
<select name='bc' class="form-control">
<option value="GOT">Gotham</option>
<option value="NY">Newyork</option>
<option value="SF">Sanfrans</option>
</select>
<br><br>

<label><b>Username:</b></label><br>
<input name="username" class="form-control" placeholder="Enter Username" type="text" required>
<br><br>

<label><b>User password:</b></label><br>
<input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
<br><br>

<label><b>Re-enter password:</b></label><br>
<input type="password" class="form-control" placeholder="Reenter password" name="rpsw" required>
<br><br>

<label><b>Account number:</b></label><br>
<input name="Accountno" class="form-control" placeholder="Enter Accountnumber" type="text"  required>
<br><br>

<label><b>Account Type:</b></label><br>
<select name='at' class="form-control">
<option value="SAVINGS">Saving</option>
<option value="CURRENT">Current</option>
</select>
<br><br>

<label><b>Transaction password:</b></label><br>
<input type="password" class="form-control" placeholder="Enter Transaction password" name="tp" required>
<br><br>

<label><b>Re-enter transaction password:</b></label><br>
<input type="password" class="form-control" placeholder="ReEnter Transaxtion password" name="tpcheck" required>
<br><br>
<input name="submit" value="Submit" type="submit">
<br>
<br>
</form>
    </div>
  </div>
</div>


</body>
</html>