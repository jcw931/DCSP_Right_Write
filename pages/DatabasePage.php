<!DOCTYPE html>
<html>
<title>Manage Database - The Right Write</title>
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
    <p class="w3-left">Manage Database</p>
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
				
				// If the user is an Admin, creates an Admin account object.
				if ($_SESSION['type'] == 'Admin') {
					$result = allAdminData($un, $pw, $hostName, $database, $_SESSION['uname']);
					$account = new Admin($result['adminID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email']);
				}
				// If the user is a Customer or Vendor, redirects to "Admin Only" page.
				else if (($_SESSION['type'] == 'Customer') || ($_SESSION['type'] == 'Vendor'))
					goto_adminonly();
				
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
    <p>Manage the Database</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <div class="w3-col l3 s6">
	<?php
	
		
		

		
		
		
		
		
		

		
	
	
	
	?>
	  
    </div>
  </div>
 
<?php
	function goto_mustlogin() {
		header("Location: MustLoginPage.php");
		exit;
	}
	
	function goto_adminonly() {
		header("Location: MustBeAdmin.php");
		exit;
	}
?>

</body>
</html>