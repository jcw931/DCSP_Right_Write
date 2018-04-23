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
    <p class="w3-left">Search</p>
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
	
 ?>
  

<form method="post" action="SearchPage.php">
	
	<b>Type of Writing Utensil:</b><br>
	<input type="radio" name="utensil" value="wooden_pencil" selected>Wooden Pencil<br>
	<input type="radio" name="utensil" value="mechanical_pencil">Mechanical Pencil<br>
	<input type="radio" name="utensil" value="pen">Pen<br><br><br>
	
	<b>Wooden Pencil Categories:</b><br><br><br>
	
	<b>Number Pencil:</b><br>
	<input type="radio" name="number" value="wooden_pencil_1" selected >Number 1<br>
	<input type="radio" name="number" value="wooden_pencil_2"> Number 2<br>
	<input type="radio" name="number" value="wooden_pencil_3"> Number 3 <br><br>
	
	<b>Wood Type:</b><br>
	<input type="radio" name="wood_type" value="cedar">Cedar (normal)<br>
	<input type="radio" name="wood_type" value="oak"> Oak<br><br>
	
	<b>Lead Color:</b><br>
  <input type="radio" name="lead_color" value="pink">Pink<br>
	<input type="radio" name="lead_color" value="green">Green<br>
	<input type="radio" name="lead_color" value="blue">Blue<br>
	 <input type="radio" name="lead_color" value="yellow">Yellow<br>
	<input type="radio" name="lead_color" value="purple">Purple<br>
	<input type="radio" name="lead_color" value="orange">Orange<br>
	<input type="radio" name="lead_color" value="red">Red<br>
	<input type="radio" name="lead_color" value="gray">Gray<br>
	<input type="radio" name="lead_color" value="white">White<br>
	<input type="radio" name="lead_color" value="black" selected>Black<br><br><br>
  
  <b>Mechanical Pencil Categories:</b><br><br><br>
	
  
	<b>Grip:</b><br>
	<select name="grip">
	<option value="grip">Grip</option>
	<option value="no_grip">No Grip</option>
	</select><br><br>

	<b>Lead Weight:</b><br>
	<select name="lead_weight">
	  <option value="5">0.5</option>
	  <option value="7">0.7</option>
	  <option value="9">0.9</option>
	</select><br><br><br>
	
	<b>Pen Categories:</b><br><br><br>
	
	<b>Ink Color:</b> <br>
  <input type="radio" name="ink_color" value="pink">Pink<br>
	<input type="radio" name="ink_color" value="green">Green<br>
	<input type="radio" name="ink_color" value="blue">Blue<br>
	 <input type="radio" name="ink_color" value="yellow">Yellow<br>
	<input type="radio" name="ink_color" value="purple">Purple<br>
	<input type="radio" name="ink_color" value="red">Red<br>
	<input type="radio" name="ink_color" value="white">White<br>
	<input type="radio" name="ink_color" value="black" selected>Black<br><br>
	
	<b>Tip Type:</b> <br>
	<select name="tip_type">
	  <option value="ballpoint">Ballpoint</option>
	  <option value="fountain">Fountain</option>
	  <option value="gel">Gel</option>
	</select><br><br>
	
	<b>Refillable:</b> <br>
	<input type="radio" name="refill" value="no" selected>No<br>
	<input type="radio" name="refill" value="yes">Yes<br><br>
	
 
  
  want to cancel? click <a href="HomePage.php">here</a> to go back to the home page.
  
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