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
    <p class="w3-left">Cart</p>
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
		<input type="text" placeholder="Search..">
    </p>
  </header>


  <div class="w3-container w3-text-grey">
    <p>Manage the Items in Your Cart</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <div class="w3-col l3 s6">
	<?php
	
		$cart = allCartData($un, $pw, $hostName, $database, $account->getCartId());
		
		if (sizeof($cart) == 0) {
			echo '<div class="w3-container">';
			echo '<p>You do not have any items in your cart.</p>';
			echo '</div>';
		}
		
		else {
		
			foreach ($cart as $itemData) {
				
				echo '<div class="w3-container">';
				
				$item = searchItems($un, $pw, $hostName, $database, $itemData['ItemID']);
				
				if ($item == False)
					echo '<p>This Item does not exist.</p>';
					
				else {
					
					echo "<table>";
					echo "<tr>";

					echo "<td>";
					 //replace with proper image
					echo "<image src=\"images/stockYellowPencil.png\"  style=\"width:500px;height:300px;\">";
					echo"</td>";

					echo "<td>";
					
					
					
					
					
					
					
					
					
					// This indicates that the item is a pen.
					if (isset($item['inkColor'])) {
						echo "<div id = \"pen\">";

						echo "<br/>";

						echo "<b> Name: </b>".$woodenPencil['name'] ."<br/>";
						echo "<b> Description: </b>".$woodenPencil['description'] ."<br/>";
						echo "<b> Lead Weight: </b>".$woodenPencil['tipType'] ."   "."<b> Lead Color: </b>".$woodenPencil['refill'] ."   ";
						echo "<b> Wood Type: </b>".$woodenPencil['woodType'] ."<br/>";
						echo "<b> Price: </b>$".$woodenPencil['price'] ."<br/>";
						echo "<b> In Stock: </b>".$woodenPencil['qty'] ."<br/> <br/>";

						echo "</div>";
					}
					
					// This indicates that the item is a wooden pencil.
					else if (isset($item['woodType'])) {
						echo "<div id = \"woodenPencil\">";

						echo "<br/>";

						echo "<b> Name: </b>".$item['name'] ."<br/>";
						echo "<b> Description: </b>".$item['description'] ."<br/>";
						echo "<b> Lead Weight: </b>".$item['number'] ."   "."<b> Lead Color: </b>".$item['leadColor'] ."   ";
						echo "<b> Wood Type: </b>".$item['woodType'] ."<br/>";
						echo "<b> Price: </b>$".$item['price'] ."<br/>";
						echo "<b> In Stock: </b>".$item['qty'] ."<br/> <br/>";

						echo "</div>";
					}
					
					// This indicates that the item is a mechanical pencil.
					else if (isset($item['gripType'])) {
						echo "<div id = \"woodenPencil\">";

						echo "<br/>";

						echo "<b> Name: </b>".$woodenPencil['name'] ."<br/>";
						echo "<b> Description: </b>".$woodenPencil['description'] ."<br/>";
						echo "<b> Lead Weight: </b>".$woodenPencil['number'] ."   "."<b> Lead Color: </b>".$woodenPencil['leadColor'] ."   ";
						echo "<b> Wood Type: </b>".$woodenPencil['woodType'] ."<br/>";
						echo "<b> Price: </b>$".$woodenPencil['price'] ."<br/>";
						echo "<b> In Stock: </b>".$woodenPencil['qty'] ."<br/> <br/>";

						echo "</div>";
					}
					
					
					
					
					
					
					
					
					echo "</td>";

					echo "<tr>";
				}

					echo "</table>";
				
				
				
				
				
				echo '</div>';
			}
			
			echo '</div><div class="w3-col l3 s6">';
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				echo '<div class="w3-container"><p>';
				
				
				
				echo $_POST['button'];
				
				
				
				echo '</p></div>';
			}
			
		}
		
	
	
	
	?>
	  
    </div>
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
?>

</body>
</html>