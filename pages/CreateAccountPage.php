<!DOCTYPE html>
<html>
<title>Create Account - The Right Write</title>
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
    <p class="w3-left">Create Account</p>
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
  
<?php
	require_once "./../classes/Accounts.php";
	require_once "./../Database/login.php";
	require_once "./../Database/databaseController.php";
	
	$type_user = $firstname = $lastname = $email = $username = $password = $address = $userID = $cartID = $brand = "";
	if(isset($_POST['type_user'])){
	//customer
		if ($_POST['type_user'] == "customer"){
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$userID = newID($un, $pw, $hostName, $database, "customer");
			$cartID = newID($un, $pw, $hostName, $database, "cart");
			addCustomer($un, $pw, $hostName, $database, $username, $password, $firstname, $lastname, $email, $userID, $cartID, $address);
			$var = new Customer($userID, $firstname, $lastname, $username, $password, $email, $address, $cartID);
			
		}
		//vendor
		else if ($_POST['type_user'] == "vendor"){
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$userID = newID($un, $pw, $hostName, $database, "vendor");
			$brand = $_POST['brand'];
			$var = new Vendor($userID, $firstname, $lastname, $username, $password, $email, $brand);
		}	
	}
?>
 

 
 
 
<form method="post" action="CreateAccountPage.php">

	<div class="w3-row w3-grayscale">

		<div class="w3-col l3 s6">
			<div class="w3-container">
				<p>Welcome to the Create Account page!</p>
			</div>
			<div class="w3-container">
				<p><b>What type of account would you like?</b></p>
				<p><input type="radio" name="type_user" value="customer" checked> Customer<br>
				<input type="radio" name="type_user" value="vendor"> Vendor</p>
			</div>
			<div class="w3-container">
				<p><b>First name:</b></p>
				<p><input type="text" name="firstname"></p>
			</div>
			<div class="w3-container">
				<p><b>Last name:</b></p>
				<p><input type="text" name="lastname"></p>
			</div>
			<div class="w3-container">
				<p><b>Email Address:</b></p>
				<p><input type="text" name="email"></p>
			</div>
			<div class="w3-container">
				<p><b>Username:</b></p>
				<p><input type="text" name="username"></p>
			</div>
			<div class="w3-container">
				<p><b>Password:</b></p>
				<p><input type="password" name="password1"></p>
			</div>
			<div class="w3-container">
				<p><b>Re-Enter Password:</b></p>
				<p><input type="password" name="password2"></p>
			</div>
		</div>
		
		<div class="w3-col l3 s6">
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container"><p></p></div>
			<div class="w3-container">
				<p><b>Street Address</b> (for customers only):</p>
				<p><input type="text" name="street"></p>
			</div>
			<div class="w3-container">
				<p><b>City</b> (for customers only):</b></p>
				<p><input type="text" name="city"></p>
			</div>
			<div class="w3-container">
				<p><b>State</b> (for customers only):</b></p>
				<p><input type="text" name="state"></p>
			</div>
			<div class="w3-container">
				<p><b>Postal Code</b> (for customers only):</b></p>
				<p><input type="text" name="zip"></p>
			</div>
			<div class="w3-container">
				<p><b>Brand</b> (for vendors only):</p>
				<p><input type="text" name="brand"></p>
			</div>
			<div class="w3-container">
				<p><input type="submit" value="Create Account"></p>
			</div>
			<div class="w3-container">
				<p>Already have an account? <a href="LoginPage.php">Log In</a> here.</p>
			</div>
		</div>
	  
	</div>

</form>


</body>
</html>