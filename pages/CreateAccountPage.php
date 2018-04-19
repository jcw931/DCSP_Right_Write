<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:2400px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-yellow w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <a href="HomePage.php"><h3 class="w3-wide"><b><img src="TheRightWrite.png" width="210" height="150"></b></h3></a>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Wooden Pencils</a>
    <a href="#" class="w3-bar-item w3-button">Mechanical Pencils</a>
    <a href="#" class="w3-bar-item w3-button">Pens</a>
  </div>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-grey w3-xlarge">
    <p class="w3-left">Create Account</p>
    <p class="w3-right">
		<a href="HomePage.php">Home</a>
		<a href="AccountPage.php">Account</a>
		<a href="LoginPage.php">Login</a>
		<a href="CartPage.php">Cart (0)</a>
      <div style="float:right" class="topnav">
	  <input type="text" placeholder="Search..">
	</div>
    </p>
  </header>
  
<?php
	require_once "LoginPage.php";
	require_once "Accounts.php";
	require_once "login.php";
	require_once "databaseController.php";
	4
	$type_user = $firstname = $lastname = $email = $username = $password = $address = $userID = $cartID = companyID = "";
	
	//customer
	if ($_POST['type_user'] == "customer"){
		$var = new Customer($userID, $firstname, $lastname, $username, $password, $email, $address, $cartID);
	}
	//vendor
	else if ($_POST['type_user'] == "vendor"){
		$var = new Vendor($userID, $firstname, $lastname, $username, $password, $email, $companyID);
	}
	//admin
	else {
		$var = new Admin($userID, $firstname, $lastname, $username, $password, $email);
	}
?>
  
  
  
<form method="post" action="CreateAccountPage.php">
	
  Welcome to the Create Account page! <br><br>
	
  <b>What type of account would you like?</b><br>
   <input type="radio" name="type_user" value="customer" checked> Customer<br>
  <input type="radio" name="type_user" value="vendor"> Vendor<br>
  <input type="radio" name="type_user" value="admin"> Admin<br><br>
  <b>First name:</b><br>
  <input type="text" name="firstname"><br>
  <b>Last name:</b><br>
  <input type="text" name="lastname"><br>
  <b>Email Address:</b><br>
  <input type="text" name="email"><br>
  <b>Username:</b><br>
  <input type="text" name="username"><br>
  <b>Password:</b><br>
  <input type="password" name="password"><br>
  <b>Address:</b><br>
  <input type="text" name="address"><br><br>
  <input type="submit" value="Create Account"><br><br>
  
  want to cancel? click <a href="LoginPage.php">here</a> to go back to the login page.
  
</form>

	

<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
