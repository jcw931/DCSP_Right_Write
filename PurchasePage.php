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
    <p class="w3-left">Purchase</p>
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
  

<form method="post" action="ReviewOrder.php">
	
	<b>Card Type:</b><br>
	<select name="cardType">
  <option value="Mastercard">MasterCard</option>
  <option value="Visa">Visa</option>
  <option value="American Express">American Express</option>
  <option value="Discover">Discover</option>
  
</select><br><br>
  <b>Card Holder Name:</b><br>
  <input type="text" name="chn"><br><br>
  <b>Credit Card Number:</b><br>
  <input type="text" name="ccn"><br><br>
  
  <b>Expiration Date:</b> <br>
  month:<br>
  <select name="month">
  <option value="jan">01</option>
  <option value="feb">02</option>
  <option value="mar">03</option>
  <option value="apr">04</option>
  <option value="may">05</option>
  <option value="june">06</option>
  <option value="july">07</option>
  <option value="aug">08</option>
  <option value="sep">09</option>
  <option value="oct">10</option>
  <option value="nov">11</option>
  <option value="dec">12</option>
</select><br>
year: <br>
<select name="year">
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
  <option value="2027">2027</option>
  <option value="2028">2028</option>
  <option value="2029">2029</option>
</select><br><br>
  <b>cvc:</b><br>
  <input type="text" name="cvc"><br><br>
  <b>New shipping address:</b> (only if different from one specified on create account) <br>
	<input type="text" name="new_address"><br><br>
  <input type="submit" value="Review Order"><br><br>
  
  want to cancel? click <a href="CartPage.php">here</a> to go back to the cart page.
  
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