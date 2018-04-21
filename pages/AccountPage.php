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
				

				// ACCOUNT ATTRIBUTES: $uID, $first, $last, $user, $pw, $mail
				// CUSTOMER ATTRIBUTES: $address, $cart, $cartID, $history
				// VENDOR ATTRIBUTES: $brand
				// ADMIN ATTRIBUTES: none
				
				// If a user is logged in
				if (isset($_SESSION['type'])) {
					session_start();
					
					$validFName = $validLName = $validEmail = $validAddress = $validBrand = $validPass = True;
					$passProblem = 'None';
					$newAddress = False;
					
					// If "Save Changes" gets pressed:
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						// Check if the changes were valid.
						$validFName = validateName($_POST['firstname']);
						$validLName = validateName($_POST['firstname']);
						$validEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
						
						// Checks if any of the address fields were edited.
						if (!(($_POST['street'] == '') && ($_POST['city'] == '') && ($_POST['state'] == '') && ($_POST['zip'] == ''))) {
							$validAddress = validateAddress($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']);
							$newAddress = True;
						}

						if (isset($_POST['brand']))
							$validBrand = validateName($_POST['brand']);
						
						
						if (!(($_POST['pass1'] == '') && ($_POST['pass2'] == ''))) {
							$passProblem = validatePasswords($_POST['pass1'], $_POST['pass2']);
							if ($passProblem != 'Valid')
								$validPass = False;
						}
						
						if ($validFName && $validLName && $validEmail && $validAddress && $validBrand && $validPass) {
							
							if ($_SESSION['type'] == 'Customer') {
								editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
								editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
								editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
								if ($newAddress) {
									$address_string = $_POST['street'] . ' ' . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];
									editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'address', $address_string);
								}
								if ($passProblem != 'None') {
									$psalt = "qm&h*" . $_POST['pass1'] . "pg!@";
									$token = hash('ripemd128', $psalt);
									editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'password', $token);
								}
							}
							else if ($_SESSION['type'] == 'Vendor') {
								editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
								editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
								editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
								editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'brand', $_POST['brand']);
							}
							else if ($_SESSION['type'] == 'Admin') {
								editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
								editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
								editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
							}
							echo '<div class="w3-container"><p>Changes Saved!</p></div>';
						}
					}
					
					
					$account = '';
					
					echo '<div class="w3-container"><p><b>Account Type:</b> ' . $_SESSION['type'] . '</p></div>';
					
					if ($_SESSION['type'] == 'Customer') {
						$result = allCustomerData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Customer($result['customerID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['address'], $result['cartID']);
					}
					else if ($_SESSION['type'] == 'Vendor') {
						$result = allVendorData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Vendor($result['vendorID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['brand']);
					}
					else if ($_SESSION['type'] == 'Admin') {
						$result = allAdminData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Admin($result['adminID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email']);
					}
					
					
					echo '<div class="w3-container"><p><b>Username:</b> ' . $account->getUname() . '</p></div>';
					
					
					echo '<div class="w3-container">';
					if (!$validFName)
						echo '<p style="color: red">First Name cannot be empty, and must start with a capital letter.</p>';
					echo '<p><b>First Name:</b> <input type="text" name="firstname" value=' . $account->getFname() . '></p></div>';
					
					echo '<div class="w3-container">';
					if (!$validLName)
						echo '<p style="color: red">Last Name cannot be empty, and must start with a capital letter.</p>';
					echo '<p><b>Last Name:</b> <input type="text" name="lastname" value=' . $account->getLname() . '></p></div>';
					
					echo '<div class="w3-container">';
					if (!$validEmail)
						echo '<p style="color: red">Email Address must be valid.</p>';
					echo '<p><b>Email Address:</b> <input type="text" name="email" value=' . $account->getEmail() . '></p></div>';
					
					if ($_SESSION['type'] == 'Customer') {
						echo '<div class="w3-container">';
						echo '<p>If you do not want to change your address, then leave these fields blank.</p>';
						echo '<p><b>Current Address:</b> ' . $account->getAddress() . '</p>';
						if (!$validAddress)
							echo '<p style="color: red">Please enter valid address information.</p>';
						echo '<p><b>New Street Address:</b> <input type="text" name="street"></p>';
						echo '<p><b>New City:</b> <input type="text" name="city"></p>';
						echo '<p><b>New State:</b> <input type="text" name="state"></p>';
						echo '<p><b>New Zip:</b> <input type="text" name="zip"></p></div>';
						// TO DO: View Purchase History
					}
					
					else if ($_SESSION['type'] == 'Vendor') {
						echo '<div class="w3-container">';
						if (!$validBrand)
							echo '<p style="color: red">Brand cannot be empty, and must start with a capital letter.</p>';
						echo '<p><b>Brand:</b> <input type="text" name="brand" value=' . $account->getBrand() . '></p></div>';
					}
					
					echo '<div class="w3-container">';
					echo '<p>If you do not want to change your password, then leave these fields blank.</p>';
					if (!$validPass) {
						if ($passProblem == 'Mismatch')
							echo '<p style="color: red">Passwords must be exact matches.</p>';
						else if ($passProblem == 'Short')
							echo '<p style="color: red">Passwords must be at least 6 characters long.</p>';
						else if ($passProblem == 'Character')
							echo '<p style="color: red">Passwords must have at least 1 uppercase letter, lowercase letter, and number.</p>';
					}
					echo '<p><b>New Password:</b> <input type="password" name="pass1"></p>';
					echo '<p><b>Re-Enter New Password:</b> <input type="password" name="pass2"></p></div>';
				
					echo '<div class="w3-container"><p><input type="submit" value="Save Changes"></p></div>';
				
				
					/*

					<div class="w3-container">
						<p><input type="submit" value="Save Changes"></p>
					</div>
					<div class="w3-container">
						<p>Don't have an account? <a href="CreateAccountPage.php">Create Account</a></p>'
					</div>
					
					NEED:
					Password: minimum 6 digits; include at least one capital letter, lowercase letter, and number)
					
					CUSTOMER:
					Home address
					Purchase history
					
					VENDOR:
					Brand
					
					ADMIN:
					
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
	<?php
		// Validates names.
		function validateName($name) {
			// Name can't be empty.
			if ($name == '')
				return False;
			
			// Name must start with a capital letter.
			else if (!((ord(substr($name, 0)) >= 65) && (ord(substr($name, 0)) <= 90)))
				return False;
			
			else
				return True;
		}
		
		
		// Validates addresses.
		function validateAddress($street, $city, $state, $zip) {
			// Street cannot be empty.
			if ($street == '')
				return False;
			
			// City and state must qualify as names.
			else if (!(validateName($city) && validateName($state)))
				return False;
			
			// Zip must be exactly 5 digits long.
			else if (strlen($zip) != 5)
				return False;
			
			// Zip must only contain numbers.
			else {
				for ($i = 0; $i < 5; $i++) {
					if (!((ord(substr($zip, $i)) >= 48) && (ord(substr($zip, $i)) <= 57)))
						return False;
				}
			}
			
			// If function makes it this far, then the given address is valid; returns true.
			return True;
		}
			
		
		// Validates passwords. Returns 'Valid' if they are valid, else returns 'Mismatch', 'Short', or 'Character' depending on what the problem is.
		function validatePasswords($pass1, $pass2) {
			// Passwords must be identical.
			if ($pass1 != $pass2)
				return 'Mismatch';
			
			// Passwords must be at least 6 characters long.
			// At this point, only pass1 needs to be checked because pass1 and pass2 are identical.
			else if (strlen($pass1) < 6)
				return 'Short';
			
			// Passwords must have at least one uppercase letter, lowercase letter, and number.
			$upper = $lower = $number = False;
			
			for ($i = 0; $i < strlen($pass1); $i++) {
				if ($upper && $lower && $number)
					break;
				
				else {
					if ((ord(substr($pass1, $i)) >= 65) && (ord(substr($pass1, $i)) <= 90))
						$upper = True;
					else if ((ord(substr($pass1, $i)) >= 97) && (ord(substr($pass1, $i)) <= 122))
						$lower = True;
					else if ((ord(substr($pass1, $i)) >= 48) && (ord(substr($pass1, $i)) <= 57))
						$number = True;
				}
			}
			
			if ($upper && $lower && $number)
				return 'Valid';
			else
				return 'Character';
		}
	?>
</body>
</html>




















