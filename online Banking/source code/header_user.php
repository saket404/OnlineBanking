<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<body class="w3-theme-l5">
<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-black w3-left-align w3-large">
 <li class="w3-left"><a class = "navbar-brand-left w3-hover-black"><img src = "img/e.png" width="35" height="35"></a></li>
 <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
 </li>
 <li class="w3-hide-small"><a href="accstatement.php" class="w3-padding-large w3-hover-white" title="Account Statements"><i class="fa fa-book"></i></a></li>
 <li class="w3-hide-small"><a href="usermail.php" class="w3-padding-large w3-hover-white" title="Mail"><i class="fa fa-envelope"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a></li>
 <li class="w3-hide-small"><a href="useraccsetting.php" class="w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-cog"></i></a></li>
 <li class="w3-hide-small w3-right"><a href="userpage.php" class="w3-padding-large w3-hover-white" title="My Account"><img src="img/batman.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a></li>
 </ul>
</div>
