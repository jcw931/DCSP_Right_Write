<!DOCTYPE html>
<html>
<title>The Right Write - Account</title>
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
    <p class="w3-left">Account</p>
    <p class="w3-right">
		<a href="HomePage.php">Home</a>
		<a href="AccountPage.php">Account</a>
		<?php
			session_start();
			if (isset($_SESSION['uname'])) {
			echo '<a href="LogoutPage.php">Logout</a>';
			}
			else { // if no user is logged in
			echo '<a href="LoginPage.php">Login</a>';
			}
		?>
		<a href="CartPage.php">Cart (0)</a>
		<input type="text" placeholder="Search..">
    </p>
  </header>


  <div class="w3-container w3-text-grey" id="jeans">
    <p>View or Edit your Account Information</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
	<form method="post" action="AccountPage.php">
		<div class="w3-col l3 s6">
			<?php
				require_once './../Database/login.php';
				require_once './../Database/databaseController.php';
				require_once './../classes/Accounts.php';
				
				session_start();
				
				// ACCOUNT ATTRIBUTES: $uID, $first, $last, $user, $pw, $mail
				// CUSTOMER ATTRIBUTES: $address, $cart, $cartID, $history
				// VENDOR ATTRIBUTES: $brand
				// ADMIN ATTRIBUTES: none
				
				// If a user is logged in
				if (isset($_SESSION['type'])) {
					$account = '';
					
					echo '<div class="w3-container"><p>Session Type: ' . $_SESSION['type'] . '<br></p></div>';
					//echo $test_variable;
					
					if ($_SESSION['type'] == 'customer') {
						echo '<div class="w3-container"><p>Customer Class Creation..';
						$result = allCustomerData($un, $pw, $hostName, $database, $_SESSION['uname']);
						echo '!!';
						$account = new Customer('1', '2', '3', '4', '5', '6', '7', '8');
						echo '??';
						$account->setAddress('444');
						echo '..done<br></p></div>';
					}
					else if ($_SESSION['type'] == 'vendor') {
						echo '<div class="w3-container"><p>Vendor Class Triggered<br></p></div>';
						$result = allVendorData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Vendor($result['vendorID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['brand']);
					}
					else if ($_SESSION['type'] == 'admin') {
						echo '<div class="w3-container"><p>Admin Class Triggered<br></p></div>';
						$result = allAdminData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Admin($uID, $first, $last, $user, $pw, $mail);
					}
					
					
					echo '<div class="w3-container"><p>Session Type: ' . $_SESSION['type'] . '<br></p></div>';
					
					/*
					<div class="w3-container">
						<input type="text" name="username" value="<?php echo $_POST['username'] ?>"> <br>
					</div>
					<div class="w3-container">
						<p>Password<br></p>
					</div>
					<div class="w3-container">
						<input type="password" name="password" value="<?php echo $_POST['password'] ?>"> <br>
					</div>
					<div class="w3-container">
						<p><input type="submit" value="Login"></p>
					</div>
					<div class="w3-container">
						<p>Don't have an account? <a href="CreateAccountPage.php">Create Account</a></p>'
					</div>
					*/
				}
				
				// If a user is not logged in
				else {
					echo '<div class="w3-container"><p>You must <a href="LoginPage.php">Log In</a> to view your account information.<br></p></div>';
				}
			?>
		</div>
	</form>

  </div>

</body>
</html>