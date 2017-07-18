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
      color: #818181;
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
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #000000;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    }
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
    
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class = "navbar-brand-left" href="#myPage"><img src = "img/e.png" width="50" height="50"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#Login">LOGIN</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#branch">BRANCHES</a></li>
        <li><a href="#CustomerReviews">FEEDBACK</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="register.php">REGISTER</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>Evil Bank</h1>
  <p>Your money is safe with us.</p>
  <img src="img/bat.jpg" class="img-rounded" alt="Cinque Terre" width="800" height="236"><br>
</div>



<div id="Login" class="container-fluid">
  <div class="row">
    <div class="col-sm-3" style = "background-color: #000000">
        <h2 style="color: #ffffff"><img src = "img/e.png" width="35" height="35">&nbsp;&nbsp;&nbsp;login to your account</h2>
        <form class="form-inline" action="check_login.php" method="post" >
                <label><b><font color ="white">Username:</font> </b></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="uname" required> <br>
                <br>
    
                <label><b><font color ="white">Password:</font> </b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                <br>
        
                <button type="submit" class="btn btn-default">Login</button>
                <br>
            <input type="checkbox" checked="checked"><font color ="white"> Remember me</font><br>
            <a href="register.php"><font color ="white">Register now</font></a>
      </form>
      </div><div class="col-sm-1"></div>
      <div class="col-sm-2">
      <h2 style="color: #000000">What is this?</h2><br>
      <h4 style="color: #000000">Door to your online bank account.</h4><br>
      </div>
      <div class="col-sm-2">
      <span class="glyphicon glyphicon-user logo"></span>
      </div>
  </div>
</div>


<!-- Container (About Section) -->
<div id="about" class="container-fluid" style ="background-color: #000000">
  <div class="row">
    <div class="col-sm-8">
      <h2 style="color: #ffffff">About Evil Bank</h2><br>
      <h4 style="color: #ffffff">Our bank was founded in order to assist people with their financial problems.</h4><br>
      <p>An alternative service that lets you conduct banking transactions conveniently and simply via your mobile phone anywhere, anytime. With our online application you can transfer, request for loans and pay loans with our application by just sitting in your home.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-usd logo"></span>
    </div>
  </div>
</div>



<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>Bank Account</h4>
      <p>We have all type of account !!</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo-small"></span>
      <h4>Internet Banking</h4>
      <p>Use evil bank at anywhere and anytime</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-bitcoin logo-small"></span>
      <h4>LOAN</h4>
      <p>Short on money ? we are here to help you.</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-sort logo-small"></span>
      <h4>TRANSFER</h4>
      <p>You can transfer your fund when ever you want</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cd logo-small"></span>
      <h4>REAL TIME UPDATE</h4>
      <p>You can check your transaction history</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-upload logo-small"></span>
      <h4 style="color:#303030;">OTHER</h4>
      <p>You can also transfer to another bank client</p>
    </div>
  </div>
</div>




<!-- Container (Branch Section) -->
<div id="branch" class="container-fluid text-center bg-grey" style ="background-color: #000000">
  <h2 style="color: #ffffff">Branches</h2><br>
  <h4 style="color: #ffffff">Our branches</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/bat.jpg" alt="Gotham" width="400" height="300">
        <p><strong>Gotham , Bankgok</strong></p>
        <p>Our main headquarters.</p>
        Bangkok:<embed src="http://www.clocklink.com/clocks/5012-black.swf?TimeZone=Thailand_Bangkok" width="151" height="50" wmode="transparent" type="application/x-shockwave-flash">
  
  
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/newyork.jpg" alt="New York" width="400" height="300">
        <p><strong>New York</strong></p>
        <p>We built New York</p>
        &nbsp;&nbsp;New York:<embed src="http://www.clocklink.com/clocks/5012-black.swf?TimeZone=USA_NewYork" width="151" height="50" wmode="transparent" type="application/x-shockwave-flash">
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/final.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>San Francisco</strong></p>
        <p>Yes, San Fran is ours</p>
        &nbsp;&nbsp;San Francisco:<embed src="http://www.clocklink.com/clocks/5012-black.swf?TimeZone=USA_SanFrancisco" width="151" height="50" wmode="transparent" type="application/x-shockwave-flash">
      </div>
    </div>
  </div><br>
</div>


<div id="CustomerReviews" class="container-fluid text-center bg-grey">
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Best Bank ever, Huehuehuehue"<br><span style="font-style:normal;">Prathiphan Dubey,President</span></h4>
      </div>
      <div class="item">
        <h4>"Help me from them please !!!!!"<br><span style="font-style:normal;">Passavich Pom, General slave</span></h4>
      </div>
      <div class="item">
        <h4>"This bank is not evil at all huehuehuehue"<br><span style="font-style:normal;">Saket Khandelwar,Somedude, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey" style ="background-color: #000000">
  <h2 class="text-center" style="color: #ffffff">CONTACT</h2>
  <div class="row">
    <div class="text-center">
      <p>Feel free to contact us anytime.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> (Head quarters) Gotham, Thailand</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515 (24 hrs)</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
  </div>
</div>

<div id="googleMap" style="height:400px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(13.652398, 100.485962);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Evil Bank ©</a></p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
