<!DOCTYPE html>
<html>
<title>Payment - The Right Write</title>
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
    <p class="w3-left">Payment</p>
    <p class="w3-right">
		<a href="HomePage.php">Home</a>
		<?php
			require_once './../Database/login.php';
			require_once './../Database/databaseController.php';
			require_once './../classes/Accounts.php';
			
			session_start();
			if (isset($_SESSION['type'])) {
				echo '<a href="AccountPage.php">Account</a>';
				echo ' ';
				echo '<a href="LogoutPage.php">Logout</a>'; 
				echo ' ';
				echo '<a href="CartPage.php">Cart</a>';
				echo ' ';
				
				$validCHN = $validCCN = $validCVC = True;
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
					$validCHN = validateName($_POST['chn']);
					$validCCN = validateCCNumber($_POST['ccn'], $_POST['cardType']);
					$validCVC = validateCVC($_POST['cvc'], $_POST['cardType']);
					
					if ($validCHN && $validCCN && $validCVC) {
						
					}
				}
				
				
				$account = '';
				
				// If the user is a Customer, creates a Customer account object.
				if ($_SESSION['type'] == 'Customer') {
					$result = allCustomerData($un, $pw, $hostName, $database, $_SESSION['uname']);
					$account = new Customer($result['customerID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['address'], $result['cartID']);
				}
				// If the user is a Vendor or Admin, redirects to "Customer Only" page.
				else if (($_SESSION['type'] == 'Vendor') || ($_SESSION['type'] == 'Admin'))
					goto_customeronly();
			}
			
			// If no user is logged in, redirects to "must login" page.
			else {
				echo '<a href="LoginPage.php">Login</a>';
				echo ' ';
				
				goto_mustlogin();
			}
		?>
		<input type="text" placeholder="Search..">
    </p>
  </header>
  
<div class="w3-container w3-text-grey">
	<p>Provide Your Payment Information</p>
</div>
  
<form method="post" action="PaymentPage.php">

	<div class="w3-row w3-grayscale">
	
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Card Type:</b><br>
				<select name="cardType">
					<option value="Mastercard">MasterCard</option>
					<option value="Visa">Visa</option>
					<option value="American Express">American Express</option>
					<option value="Discover">Discover</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Card Holder Name:</b><br>
				<input type="text" name="chn"></p>
			</div>
			
			<div class="w3-container">
				<p><b>Card Number:</b><br>
				<input type="text" name="ccn"></p>
			</div>
  
			<div class="w3-container">
				<p><b>Expiration Date</b><br>Month:
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
					</select>
				Year:
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
					</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>CVC:</b><br>
				<input type="text" name="cvc"></p>
			</div>
			
			<div class="w3-container">
				<p><b>Current Shipping Address:</b><br>
				<?php echo $account->getAddress(); ?></p>
			</div>
			
			<div class="w3-container">
				<a href="AccountPage.php">Change Shipping Address</a>
			</div>
			
			<div class="w3-container">
				<a href="CartPage.php">Go Back to Cart</a>
			</div>
			
			<div class="w3-container">
				<p><input type="submit" value="Place Order"></p>
			</div>
		
		</div>
		
	</div>
  
</form>

<?php
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

	function validateCCNumber($ccNumber, $cardType) {
		// CCN must be exactly 15 or 16 digits long.
		
		if ($cardType == 'American Express') {
			if (strlen($ccnumber) != 15)
				return 'AELength';
		}
		else {
			if (strlen($ccnumber) != 16)
				return 'Length';
		}
		
		// CCN must only contain numbers.
		else {
			for ($i = 0; $i < strlen($ccnumber); $i++) {
				if (!((ord(substr($ccNumber, $i)) >= 48) && (ord(substr($ccNumber, $i)) <= 57)))
					return 'Numbers';
			}
		}
			
		return 'Valid';
	}

	function validateCVC($cvc, $cardType) {
		// CVC must be exactly 3 or 4 digits long.
		if ($cardType == 'American Express') {
			if (strlen($cvc) != 4)
				return 'AELength';
		}
		else {
			if (strlen($cvc) != 3)
				return 'Length';
		}
		
		// CVC must only contain numbers.
		else {
			for ($i = 0; $i < strlen($cvc); $i++) {
				if (!((ord(substr($street, $i)) >= 48) && (ord(substr($street, $i)) <= 57)))
					return 'Numbers';
			}
		}
			
		return 'Valid';
	}

	function goto_mustlogin() {
		header("Location: MustLoginPage.php");
		exit;
	}
	
	function goto_customeronly() {
		header("Location: MustBeCustomerPage.php");
		exit;
	}
?>


</body>
</html>