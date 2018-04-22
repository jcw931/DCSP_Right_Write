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
	
	// Initialize booleans for input validation.
	$validFName = $validLName = $validUname = $validEmail = $validAddress = $validBrand = $validPass = True;
	$userProblem = 'None';
	$passProblem = 'None';
	
	// Executes if the "Create Account" button was pressed.
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		// Validate the user's input.
		$validFName = validateName($_POST['firstname']);
		$validLName = validateName($_POST['lastname']);
		
		$userProblem = validateUsername($un, $pw, $hostName, $database, $_POST['username']);
		if ($userProblem != 'Valid')
			$validUname = False;

		$passProblem = validatePasswords($_POST['password1'], $_POST['password1']);
		if ($passProblem != 'Valid')
			$validPass = False;
		$validEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		
		// If the user wants a customer account, perform customer-specific actions.
		if ($_POST['type_user'] == "customer") {
			
			$validAddress = validateAddress($_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']);
			
			// If all input is valid, create the specified account.
			if ($validFName && $validLName && $validUname && $validPass && $validEmail && $validAddress) {
				
				$userID = newID($un, $pw, $hostName, $database, "customer");
				$cartID = newID($un, $pw, $hostName, $database, "cart");
				$address_string = $_POST['street'] . ' ' . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];
				
				$psalt = "qm&h*" . $_POST['password1'] . "pg!@";
				$token = hash('ripemd128', $psalt);
				
				addCustomer($un, $pw, $hostName, $database, $_POST['username'], $token, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $userID, $cartID, $address_string);
				
				// Go to "successful account creation" page.
				goto_success();
			}
		}
			
		// If the user wants a vendor account, perform vendor-specific actions.
		else if ($_POST['type_user'] == "vendor") {
			
			$validBrand = validateName($_POST['brand']);
			
			// If all input is valid, create the specified account.
			if ($validFName && $validLName && $validUname && $validPass && $validEmail && $validBrand) {
				
				$vendorID = newID($un, $pw, $hostName, $database, "vendor");
				
				$psalt = "qm&h*" . $_POST['password1'] . "pg!@";
				$token = hash('ripemd128', $psalt);
				
				addVendor($un, $pw, $hostName, $database, $_POST['username'], $token, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $vendorID, $_POST['brand']);
				
				// Go to "successful account creation" page.
				goto_success();
			}
		}
	}
?>
<form method="post" action="CreateAccountPage.php">

	<div class="w3-row w3-grayscale">

		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p>Create a New Account</p>
			</div>
			
			<div class="w3-container">
				<p><b>What type of account would you like?</b></p>
				<?php
					if (isset($_POST['type_user'])) {
						if ($_POST['type_user'] == "customer") {
							echo '<p><input type="radio" name="type_user" value="customer" checked> Customer<br>';
							echo '<input type="radio" name="type_user" value="vendor"> Vendor</p>';
						}
						else if ($_POST['type_user'] == "vendor") {
							echo '<p><input type="radio" name="type_user" value="customer"> Customer<br>';
							echo '<input type="radio" name="type_user" value="vendor" checked> Vendor</p>';
						}
					}
					else {
						echo '<p><input type="radio" name="type_user" value="customer" checked> Customer<br>';
						echo '<input type="radio" name="type_user" value="vendor"> Vendor</p>';
					}
				?>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validFName)
						echo '<p style="color: red">First Name cannot be empty, and must only contain letters.</p>';
				?>
				<p><b>First name:</b></p>
				<p><input type="text" name="firstname" value="<?php echo $_POST['firstname'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validLName)
						echo '<p style="color: red">Last Name cannot be empty, and must only contain letters.</p>';
				?>
				<p><b>Last name:</b></p>
				<p><input type="text" name="lastname" value="<?php echo $_POST['lastname'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validEmail)
						echo '<p style="color: red">Email Address must be valid.</p>';
				?>
				<p><b>Email Address:</b></p>
				<p><input type="text" name="email" value="<?php echo $_POST['email'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validUname) {
						if ($userProblem == 'Empty')
							echo '<p style="color: red">Username cannot be empty.</p>';
						else if ($userProblem == 'Start')
							echo '<p style="color: red">Username must start with a letter.</p>';
						else if ($userProblem == 'Exists')
							echo '<p style="color: red">An account with this username already exists.</p>';
					}
				?>
				<p><b>Username:</b></p>
				<p><input type="text" name="username" value="<?php echo $_POST['username'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validPass) {
						if ($passProblem == 'Mismatch')
							echo '<p style="color: red">Passwords must be exact matches.</p>';
						else if ($passProblem == 'Short')
							echo '<p style="color: red">Passwords must be at least 6 characters long.</p>';
						else if ($passProblem == 'Character')
							echo '<p style="color: red">Passwords must have at least 1 uppercase letter, lowercase letter, and number.</p>';
					}
				?>
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
				<?php
					if (!$validAddress)
						echo '<p style="color: red">Please enter valid address information.</p>';
				?>
				<p><b>Street Address</b> (for customers only):</p>
				<p><input type="text" name="street" value="<?php echo $_POST['street'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<p><b>City</b> (for customers only):</b></p>
				<p><input type="text" name="city" value="<?php echo $_POST['city'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<p><b>State</b> (for customers only):</b></p>
				<p><input type="text" name="state" value="<?php echo $_POST['state'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<p><b>Postal Code</b> (for customers only):</b></p>
				<p><input type="text" name="zip" value="<?php echo $_POST['zip'] ?>"></p>
			</div>
			
			<div class="w3-container">
				<?php
					if (!$validBrand)
						echo '<p style="color: red">Brand name cannot be empty, and must only contain letters.</p>';
				?>
				<p><b>Brand</b> (for vendors only):</p>
				<p><input type="text" name="brand" value="<?php echo $_POST['brand'] ?>"></p>
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

<?php
	// Validates names.
	function validateName($name) {
		
		// Name can't be empty.
		if ($name == '')
			return False;
		
		// Name must start with a capital letter.
		else if (!((ord(substr($name, 0)) >= 65) && (ord(substr($name, 0)) <= 90)))
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
	
	function validateUsername($un, $pw, $hostName, $database, $username) {
		
		// Username can't be empty.
		echo '<p style="color: red">' . $username . '</p>';
		
		if ($username == '')
			return 'Empty';
		
		// Username must start with a letter.
		else if (!(((ord(substr($username, 0)) >= 65) && (ord(substr($username, 0)) <= 90)) || ((ord(substr($username, 0)) >= 97) && (ord(substr($username, 0)) <= 122))))
			return 'Start';
		
		else {
			// Username must only contain letters and numbers.
			for ($i = 0; $i < strlen($username); $i++) {
				if (!(((ord(substr($username, 0)) >= 65) && (ord(substr($username, 0)) <= 90)) || ((ord(substr($username, 0)) >= 97) && (ord(substr($username, 0)) <= 122)) || ((ord(substr($pass1, $i)) >= 48) && (ord(substr($pass1, $i)) <= 57))))
					return 'Letter';
			}
		}
		
		if (existingUsername($un, $pw, $hostName, $database, $username))
			return 'Exists';
		else
			return 'Valid';
	}
	
	function goto_success() {
		header("Location: AccountCreated.php");
		exit;
	}
?>


</body>
</html>