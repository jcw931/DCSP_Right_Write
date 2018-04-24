<!DOCTYPE html>
<html>
<title>Cart - The Right Write</title>
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
    <a href="HomePage.php"><h3 class="w3-wide"><b><img src="images/TheRightWrite.png" width="210" height="150"></b></h3></a>
  </div>
  <div class="w3-padding-64 w3-large w3-text-black" style="font-weight:bold">
    <a href="WoodenPencilPage.php" class="w3-bar-item w3-button">Wooden Pencils</a>
    <a href="MechanicalPencilPage.php" class="w3-bar-item w3-button">Mechanical Pencils</a>
    <a href="PenPage.php" class="w3-bar-item w3-button">Pens</a>
  </div>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-grey w3-xlarge">
    <p class="w3-left">Cart</p>
    <p class="w3-right">
		<a href="HomePage.php">Home</a>
		<?php
			require_once './../Database/login.php';
			require_once './../Database/databaseController.php';
			require_once './../classes/Accounts.php';
			require_once "CartDisplayFunctions.php";
			require_once 'usefulFunctions.php';
			
			session_start();
			if (isset($_SESSION['type'])) {
				echo '<a href="AccountPage.php">Account</a>';
				echo ' ';
				echo '<a href="LogoutPage.php">Logout</a>'; 
				echo ' ';
				echo '<a href="CartPage.php">Cart</a>';
				echo ' ';
				
				// If the user is a Customer, creates a Customer account object.
				if ($_SESSION['type'] == 'Customer') {
					$result = allCustomerData($un, $pw, $hostName, $database, $_SESSION['uname']);
					$account = new Customer($result['customerID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['address'], $result['cartID']);
				}
				// If the user is a Vendor or Admin, redirects to "Customer Only" page.
				else if (($_SESSION['type'] == 'Vendor') || ($_SESSION['type'] == 'Admin'))
					goto_customeronly();
			}
			
			// If no user is logged in, redirects to login page.
			else {
				echo '<a href="LoginPage.php">Login</a>';
				echo ' ';
				
				goto_mustlogin();
			}
		?>
		<a href="SearchPage.php">Search</a>
    </p>
  </header>


  <div class="w3-container w3-text-grey">
    <p>Manage the Items in Your Cart</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
	<?php
		$cartID = $account->getCartId();
		
		$price = cartTotal($un, $pw, $hostName, $database, $cartID);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$itemID = array_search("Delete from Cart", $_POST);
			if ($itemID != False) {
				removeItemFromCart($un, $pw, $hostName, $database, $cartID, $itemID);
			}

			// If "Add to Cart" was selected on an item, it will navigate to here, where that item's ID and the selected quantity will be added to the cart of whoever is logged in.
			$itemID = array_search("Add to Cart", $_POST);
			if ($itemID != False) {
				$itemQty = $_POST['quantity'];
				addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);
			}
		}
	
		$cart = allCartData($un, $pw, $hostName, $database, $account->getCartId());
		
		if (sizeof($cart) == 0) {
			echo '<div class="w3-container">';
			echo '<p>You do not have any items in your cart.</p>';
			echo '</div>';
		}
		
		echo '<form method="post" action="SearchPage.php">';
		echo '<div class="w3-container"><p>';
		
		
		
		echo '<input type="submit" value="Continue Shopping"></p></div></form>';
		
		if (sizeof($cart) != 0) {
			
			echo '<form method="post" action="PaymentPage.php">';
			echo '<div class="w3-container">';
			echo 'Total Price: $' . number_format($price, 2);
			echo '<p><input type="submit" name="cart_post" value="Proceed to Checkout"></p></div></form>';
		
			foreach ($cart as $itemData) {
				
				$itemID = $itemData['ItemID'];
				
				$pen = penData($un, $pw, $hostName, $database, $itemID);
				$wood = woodData($un, $pw, $hostName, $database, $itemID);
				$mech = mechData($un, $pw, $hostName, $database, $itemID);
				
				if (sizeof($pen) != 0) {
					$item = $pen;
				}
				else if (sizeof($wood) != 0) {
					$item = $wood;
				}
				else if (sizeof($mech) != 0) {
					$item = $mech;
				}
				

				
				
				if ($item == False)
					echo '<p>This Item does not exist.</p>';
					
				else {
					// PENS
					if (isset($item['inkColor'])) {
						displaySinglePen($item);

					}
					
					// WOOD PENCILS
					else if (isset($item['woodType'])) {
						displaySingleWoodenPencil($item);

					}
					
					// MECH PENCILS
					else if (isset($item['gripType'])) {
						displaySingleMechanicalPencil($item);
					}

				}
				
				echo '<form method="post" action="CartPage.php">';
				echo '<div class="w3-container"><p>Quantity: ' . $itemData['itemQty'] . ' <input type="submit" name="' . $itemData['ItemID'] . '" value="Delete from Cart"></div></form>';
				
			}
		}
		
	
	
	
	?>
	  

  </div>
 
<?php
	// Searches the three item databases for an item with the given itemID.
	function searchItems($un, $pw, $hostName, $database, $itemID) {
		$result = penData($un, $pw, $hostName, $database, $itemID);
		if ($result == False) {
			$result = woodData($un, $pw, $hostName, $database, $itemID);
			if ($result == False)
				$result = mechData($un, $pw, $hostName, $database, $itemID);
		}
		return $result;
	}



	function goto_mustlogin() {
		header("Location: MustLoginPage.php");
		exit;
	}
	
	function goto_customeronly() {
		header("Location: MustBeCustomer.php");
		exit;
	}
	
	function goto_payment() {
		/*
		header("Location: PaymentPage.php");
		exit;*/
		
		echo '<p> OOOOOOH HES TRYIN</p>';
	}
	
?>

</body>
</html>