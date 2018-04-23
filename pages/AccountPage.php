<!DOCTYPE html>
<html>
<title>Account - The Right Write</title>
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


<div class="w3-container w3-text-grey">
	<p><b>View or Edit your Account Information</b></p>
</div>


  <!-- Product grid -->
<div class="w3-row w3-grayscale">
			<?php
				require_once './../Database/login.php';
				require_once './../Database/databaseController.php';
				require_once './../classes/Accounts.php';
				
				
				// Executes proper content for a logged-in user.
				if (isset($_SESSION['type'])) {
					
					// Initialize boolean variables used for input verification.
					$validFName = $validLName = $validEmail = $validAddress = $validBrand = $validPass = True;
					$passProblem = 'None';
					
					// If any "Save Changes" button gets pressed.
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						// Executes if personal information "Save Changes" was pressed.
						if (isset($_POST['firstname'])) {
							
							// Checks if the field entries are valid.
							$validFName = validateName($_POST['firstname']);
							$validLName = validateName($_POST['lastname']);
							$validEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
							
							// If all entries are valid, updates database with new entries.
							if ($validFName && $validLName && $validEmail) {
								if ($_SESSION['type'] == 'Customer') {
									editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
									editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
									editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
								}
								else if ($_SESSION['type'] == 'Vendor') {
									editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
									editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
									editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
								}
								else if ($_SESSION['type'] == 'Admin') {
									editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'fname', $_POST['firstname']);
									editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'lname', $_POST['lastname']);
									editAdmin($un, $pw, $hostName, $database, $_SESSION['uname'], 'email', $_POST['email']);
								}
								echo '<div class="w3-container"><p>Personal Information saved.</p></div>';	
							}
						}
						
						// Executes if address field "Save Changes" was pressed.
						else if (isset($_POST['street'])) {
							
							// Checks if any of the address fields were edited.
							$validAddress = validateAddress($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']);
							
							// If address fields are valid, formats them into a string and sends it to the database.
							if ($validAddress) {
								$address_string = $_POST['street'] . ' ' . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];
								editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'address', $address_string);
								echo '<div class="w3-container"><p>Address Information saved.</p></div>';
							}
						}
						
						// Executes if brand field "Save Changes" was pressed.
						else if (isset($_POST['brand'])) {
							
							// Checks if the given brand name is valid.
							$validBrand = validateName($_POST['brand']);
							
							// If brand name is valid, sends it to the database.
							if ($validBrand) {
								editVendor($un, $pw, $hostName, $database, $_SESSION['uname'], 'brand', $_POST['brand']);
								echo '<div class="w3-container"><p>Brand Information saved.</p></div>';
							}
						}
						
						// Executes if "Change Password" was pressed.
						else if (isset($_POST['pass1'])) {
							
							// Validates the passwords. Determines if they are valid, or why they are invalid.
							$passProblem = check_credentials($un, $pw, $hostName, $database, $_SESSION['uname'], $_POST ['cpass']);
							if ($passProblem == 'Invalid')
								$validPass = False;
							else {
								$passProblem = validatePasswords($_POST['pass1'], $_POST['pass2']);
								if ($passProblem != 'Valid')
									$validPass = False;
							}
							
							// If the passwords match and are valid, salts and hashes the new password then sends it to the database.
							if ($validPass) {
								$psalt = "qm&h*" . $_POST['pass1'] . "pg!@";
								$token = hash('ripemd128', $psalt);
								editCustomer($un, $pw, $hostName, $database, $_SESSION['uname'], 'password', $token);
								echo '<div class="w3-container"><p>Password successfully changed.</p></div>';
							}
						}
					}
					// Initialize UserAccount object variable.
					$account = '';
					
					// If the user is a Customer, creates a Customer account object.
					if ($_SESSION['type'] == 'Customer') {
						$result = allCustomerData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Customer($result['customerID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['address'], $result['cartID']);
					}
					// If the user is a Vendor, creates a Vendor account object.
					else if ($_SESSION['type'] == 'Vendor') {
						$result = allVendorData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Vendor($result['vendorID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['brand']);
					}
					// If the user is an Admin, creates an Admin account object.
					else if ($_SESSION['type'] == 'Admin') {
						$result = allAdminData($un, $pw, $hostName, $database, $_SESSION['uname']);
						$account = new Admin($result['adminID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email']);
					}
				
					
					// Allows users to change their personal information (first name, last name, email address).
					echo '<form method="post" action="AccountPage.php">';
					echo '<div class="w3-col l3 s6">';
					
					echo '<div class="w3-container"><p><b><u>Change Your Personal Information</u></b></p></div>';
					
					echo '<div class="w3-container"><p><b>Account Type:</b></p><p>' . $_SESSION['type'] . '</p></div>';
					
					echo '<div class="w3-container"><p><b>Username:</b></p><p>' . $account->getUname() . '</p></div>';
					
					echo '<div class="w3-container">';
					if (!$validFName)
						echo '<p style="color: red">First Name cannot be empty, and must only contain letters.</p>';
					echo '<p><b>First Name:</b></p><p><input type="text" name="firstname" value=' . $account->getFname() . '></p></div>';
					
					echo '<div class="w3-container">';
					if (!$validLName)
						echo '<p style="color: red">Last Name cannot be empty, and must only contain letters.</p>';
					echo '<p><b>Last Name:</b></p><p><input type="text" name="lastname" value=' . $account->getLname() . '></p></div>';
					
					echo '<div class="w3-container">';
					if (!$validEmail)
						echo '<p style="color: red">Email Address must be valid.</p>';
					echo '<p><b>Email Address:</b></p><p><input type="text" name="email" value=' . $account->getEmail() . '></p></div>';
					
					echo '<div class="w3-container"><p><input type="submit" value="Save Changes"></p></div>';
					echo '</form>';
					echo '</div>';
				
					
					// Allows Customers to change their home address.
					if ($_SESSION['type'] == 'Customer') {
						
						echo '<form method="post" action="AccountPage.php">';
						
						echo '<div class="w3-col l3 s6">';
						
						echo '<div class="w3-container"><p><b><u>Change Your Address Information</u></b></p></div>';
						
						echo '<div class="w3-container"><p><b>Current Address:</b></p><p>' . $account->getAddress() . '</p></div>';
						
						if (!$validAddress)
							echo '<p style="color: red">Please enter valid address information.</p>';
						
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							echo '<div class="w3-container"><p><b>New Street Address:</b></p><p><input type="text" name="street" value=' . $_POST['street'] . '></p></div>';
							echo '<div class="w3-container"><p><b>New City:</b></p><p><input type="text" name="city" value=' . $_POST['city'] . '></p></div>';
							echo '<div class="w3-container"><p><b>New State:</b></p><p><input type="text" name="state" value=' . $_POST['state'] . '></p></div>';
							echo '<div class="w3-container"><p><b>New Zip:</b></p><p><input type="text" name="zip" value=' . $_POST['zip'] . '></p></div>';
						}
						else {
							echo '<div class="w3-container"><p><b>New Street Address:</b></p><p><input type="text" name="street"></p></div>';
							echo '<div class="w3-container"><p><b>New City:</b></p><p><input type="text" name="city"></p></div>';
							echo '<div class="w3-container"><p><b>New State:</b></p><p><input type="text" name="state"></p></div>';
							echo '<div class="w3-container"><p><b>New Zip:</b></p><p><input type="text" name="zip"></p></div>';
						}
						
						// TO DO: View Purchase History
						
						echo '<div class="w3-container"><p><input type="submit" value="Save Changes"></p></div>';
						echo '</form>';
						echo '</div>';
					}
					
					
					// Allows Vendors to change their brand name.
					else if ($_SESSION['type'] == 'Vendor') {
						
						echo '<form method="post" action="AccountPage.php">';
						echo '<div class="w3-col l3 s6">';
						
						echo '<div class="w3-container"><p><b><u>Change Your Brand Name</u></b></p></div>';
						
						if (!$validBrand)
							echo '<p style="color: red">Brand name cannot be empty, and must only contain letters.</p>';
						
						echo '<div class="w3-container"><p><b>Brand:</b> <input type="text" name="brand" value=' . $account->getBrand() . '></p></div>';

						echo '<div class="w3-container"><p><input type="submit" value="Save Changes"></p></div>';
						echo '</form>';
						echo '</div>';
					}
					
					
					// Allows users to change their password.
					echo '<form method="post" action="AccountPage.php">';
					echo '<div class="w3-col l3 s6">';
					
					echo '<div class="w3-container"><p><b><u>Change Your Password</u></b></p></div>';
					
					if (!$validPass) {
						if ($passProblem == 'Invalid')
							echo '<p style="color: red">Your "Current Password" was incorrect.</p>';
						else if ($passProblem == 'Mismatch')
							echo '<p style="color: red">Passwords must be exact matches.</p>';
						else if ($passProblem == 'Short')
							echo '<p style="color: red">Passwords must be at least 6 characters long.</p>';
						else if ($passProblem == 'Character')
							echo '<p style="color: red">Passwords must have at least 1 uppercase letter, lowercase letter, and number.</p>';
					}
					
					echo '<div class="w3-container"><p><b>Current Password:</b></p><p><input type="password" name="cpass"></p>';
					
					echo '<p><b>New Password:</b></p><p><input type="password" name="pass1"></p>';
					
					echo '<p><b>Re-Enter New Password:</b></p><p><input type="password" name="pass2"></p></div>';

					echo '<div class="w3-container"><p><input type="submit" value="Save Changes"></p></div>';
					echo '</form>';
					
					if ($_SESSION['type'] == 'Customer')
						echo '<div class="w3-container"><p><a href="PurchaseHistoryPage.php">View Purchase History</a></p></div>';
					
					else if ($_SESSION['type'] == 'Vendor')
						echo '<div class="w3-container"><p><a href="ManageInventoryPage.php">Manage Inventory</a></p></div>';
					
					else if ($_SESSION['type'] == 'Admin')
						echo '<div class="w3-container"><p><a href="DatabasePage.php">Manage Database</a></p></div>';
					
					echo '</div>';
				}
				
				// If a user is not logged in
				else
					goto_mustlogin();
			?>
 </div>
  
	<?php
		// Validates names.
		function validateName($name) {
			
			// Name can't be empty.
			if ($name == '')
				return False;
			
			else {
				// Name must only contain letters and spaces.
				for ($i = 0; $i < strlen($name); $i++) {
					if (!(((ord(substr($name, $i)) >= 65) && (ord(substr($name, $i)) <= 90)) || ((ord(substr($name, $i)) >= 97) && (ord(substr($name, $i)) <= 122)) || (ord(substr($name, $i)) == 32)))
						return False;
				}
				return True;
			}
		}
		
		
		// Validates addresses.
		function validateAddress($street, $city, $state, $zip) {
			
			// Street cannot be empty.
			if ($street == '')
				return False;
			
			// Street must start with a number.
			else if (!((ord(substr($street, 0)) >= 48) && (ord(substr($street, 0)) <= 57)))
				return False;
			
			// Street must only contain letters, numbers, and spaces.
			else {
				for ($i = 0; $i < strlen($street); $i++) {
					if (!(((ord(substr($street, $i)) >= 65) && (ord(substr($street, $i)) <= 90)) || ((ord(substr($street, $i)) >= 97) && (ord(substr($street, $i)) <= 122)) || ((ord(substr($street, $i)) >= 48) && (ord(substr($street, $i)) <= 57)) || (ord(substr($street, $i)) == 32)))
						return False;
				}
			}
			
			// City and state must qualify as names.
			if (!(validateName($city) && validateName($state)))
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
			
			// If all conditions are properly fulfilled, returns 'Valid'.
			if ($upper && $lower && $number)
				return 'Valid';
			else
				return 'Character';
		}
		
		// Given a uname and pword: returns "invalid" if uname and pword do not match a database account;
		// else returns "customer", "vendor", or "admin" based on the type of the user's account.
		function check_credentials($un, $pw, $hostName, $database, $uname, $pword) {
			
			require_once './../Database/databaseController.php';
			$answer = '';
			$result = validUsernameData($un, $pw, $hostName, $database, $uname);
			if ($result != False) {
				$psalt = "qm&h*" . $pword . "pg!@";
				$token = hash('ripemd128', $psalt);
				if ($token == $result['password']) {
					if ($result['customerID'][0] == 'c') {
						$answer = 'Customer';
					}
					else if ($result['vendorID'][0] == 'v') {
						$answer = 'Vendor';
					}
					else if ($result['adminID'][0] == 'a') {
						$answer = 'Admin';
					}
				}
				else
					$answer = 'Invalid';
			}
			else {
				$answer = 'Invalid';
			}
			return $answer;
		}
		
	function goto_mustlogin() {
		header("Location: MustLoginPage.php");
		exit;
	}
	?>
</body>
</html>