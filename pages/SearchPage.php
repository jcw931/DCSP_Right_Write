<!DOCTYPE html>
<html>
<title>Search - The Right Write</title>
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
  <div class="w3-padding-64 w3-large w3-text-black" style="font-weight:bold">
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
		<?php
			session_start();
			if (isset($_SESSION['uname'])) {
				echo '<a href="AccountPage.php">Account</a>';
				echo ' ';
				echo '<a href="LogoutPage.php">Logout</a>'; 
				echo ' ';
				echo '<a href="CartPage.php">Cart</a>';
				echo ' ';
			}
			else {
				echo '<a href="LoginPage.php">Login</a>';
				echo ' ';
			}
		?>
		<input type="text" placeholder="Search..">
    </p>
  </header>

  
<form method="post" action="SearchResultsPage.php">

	<div class="w3-row w3-grayscale">
	
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Type of Writing Utensil:</b></p>
				<p><select name="utensil">
					<option value="wooden_pencil">Wooden Pencil</option>
					<option value="mech_pencil">Mechanical Pencil</option>
					<option value="pen">Pen</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Item Color:</b></p>
				<p><input type="radio" name="itemColor" value="pink"> Pink<br>
				<input type="radio" name="itemColor" value="green"> Green<br>
				<input type="radio" name="itemColor" value="blue"> Blue<br>
				<input type="radio" name="itemColor" value="yellow"> Yellow<br>
				<input type="radio" name="itemColor" value="purple"> Purple<br>
				<input type="radio" name="itemColor" value="orange"> Orange<br>
				<input type="radio" name="itemColor" value="red"> Red<br>
				<input type="radio" name="itemColor" value="gray"> Gray<br>
				<input type="radio" name="itemColor" value="white"> White<br>
				<input type="radio" name="itemColor" value="black"> Black</p>
			</div>
			
			<div class="w3-container">
				<p><input type="submit" value="Submit Search"></p>
			</div>
			
		</div>
		
		<!-- Pen Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Pen Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Tip Type:</b></p>
				<p><select name="tip_type">
					<option value="ballpoint">Ballpoint</option>
					<option value="fountain">Fountain</option>
					<option value="gel">Gel</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Refillable:</b></p>
				<p><input type="radio" name="refill" value="yes">Yes<br>
				<input type="radio" name="refill" value="no">No</p>
			</div>
			
			<div class="w3-container">
				<p><b>Ink Color:</b></p>
				<p><input type="radio" name="ink_color" value="pink">Pink<br>
				<input type="radio" name="ink_color" value="green">Green<br>
				<input type="radio" name="ink_color" value="blue">Blue<br>
				<input type="radio" name="ink_color" value="yellow">Yellow<br>
				<input type="radio" name="ink_color" value="purple">Purple<br>
				<input type="radio" name="ink_color" value="red">Red<br>
				<input type="radio" name="ink_color" value="white">White<br>
				<input type="radio" name="ink_color" value="black">Black</p>
			</div>
			
		</div>
		
		<!-- Wooden Pencil Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Wooden Pencil Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Pencil Number:</b></p>
				<p><input type="radio" name="number" value="1"> Number 1<br>
				<input type="radio" name="number" value="2"> Number 2<br>
				<input type="radio" name="number" value="3"> Number 3</p>
			</div>
			
			<div class="w3-container">
				<p><b>Wood Type:</b></p>
				<p><input type="radio" name="wood_type" value="cedar"> Cedar<br>
				<input type="radio" name="wood_type" value="oak"> Oak</p>
			</div>
			
			<div class="w3-container">
				<p><b>Lead Color:</b></p>
				<p><input type="radio" name="lead_color" value="pink"> Pink<br>
				<input type="radio" name="lead_color" value="green"> Green<br>
				<input type="radio" name="lead_color" value="blue"> Blue<br>
				<input type="radio" name="lead_color" value="yellow"> Yellow<br>
				<input type="radio" name="lead_color" value="purple"> Purple<br>
				<input type="radio" name="lead_color" value="orange"> Orange<br>
				<input type="radio" name="lead_color" value="red"> Red<br>
				<input type="radio" name="lead_color" value="gray"> Gray<br>
				<input type="radio" name="lead_color" value="white"> White<br>
				<input type="radio" name="lead_color" value="black"> Black</p>
			</div>
			
		</div>
		
		<!-- Mechanical Pencil Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Mechanical Pencil Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Grip Type:</b></p>
				<p><select name="grip">
					<option value="grip">Grip</option>
					<option value="no_grip">No Grip</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Lead Weight:</b></p>
				<p><select name="lead_weight">
					<option value="5">0.5</option>
					<option value="7">0.7</option>
					<option value="9">0.9</option>
				</select></p>
			</div>
			
		</div>
	
	</div>
	
</form>


</body>
</html>