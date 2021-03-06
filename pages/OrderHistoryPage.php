<!DOCTYPE html>
<html>
<title>Order History - The Right Write</title>
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
    <p class="w3-left">Order History</p>
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
		<a href="SearchPage.php">Search</a>
    </p>
  </header>


  <div class="w3-container w3-text-grey">
    <p>Review Your Purchase History</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <div class="w3-col l3 s6">
	<?php
	
		
		

		$history = customerHistory($un, $pw, $hostName, $database, $account->getUID());
		
		if (sizeof($history) == 0) {
			echo '<div class="w3-container">';
			echo '<p>You do not have any orders to display.</p>';
			echo '</div>';
		}
		
		else {
		
			for ($i = 0; $i < sizeof($history); $i++) {
				echo '<div class="w3-container">';
				echo '<form method="post" action="OrderHistoryPage.php">';
				echo '<p><input type="submit" name="button" value="' . $history[$i]['orderID'] . '"></p>';
				echo '</form>';
				echo '</div>';
			}
			
			echo '</div><div class="w3-col l3 s6">';
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				
				$order = orderData($un, $pw, $hostName, $database, $_POST['button']);
				 
				// itemname, itemprice, quantity
				
				echo '<div class="w3-container">';
				
				echo '<p><b>Order ID:</b> ' . $_POST['button'] . '<br>';
				echo '<b>Date:</b> ' . $order[0]['date'] . '<br>';
				echo '<b>Total Cost:</b> $' . number_format($order[0]['totalPrice'], 2) . '</p></div>';
				
				echo '<div class="w3-container">';
				echo '<p><b>Items Ordered:</b></p>';
				
				for ($i = 0; $i < sizeof($order); $i++) {

					$itemID = $order[$i]['itemID'];
					
					$pen = penData($un, $pw, $hostName, $database, $itemID);
					$wood = woodData($un, $pw, $hostName, $database, $itemID);
					$mech = mechData($un, $pw, $hostName, $database, $itemID);
					

					if(sizeof($pen) != 0){
						echo '<p><b>Item Name:</b> ' . $pen['name'] . '<br>';
						echo '<b>Item Price:</b> ' . $pen['price'] . '<br>';
					}
					else if(sizeof($wood) != 0){
						echo '<p><b>Item Name:</b> ' . $wood['name'] . '<br>';
						echo '<b>Item Price:</b> ' . $wood['price'] . '<br>';
					}
					else if(sizeof($mech) != 0){
						echo '<p><b>Item Name:</b> ' . $mech['name'] . '<br>';
						echo '<b>Item Price:</b> ' . $mech['price'] . '<br>';
					}
					
					echo '<b>Qty Purchased:</b> ' . $order[$i]['itemQty'] . '</p>';
					
					
					
				}
				echo '</div>';
			}
			
		}
		
	
	
	
	?>
	  
    </div>
  </div>
 
<?php
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