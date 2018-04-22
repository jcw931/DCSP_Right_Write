<!DOCTYPE html>
<html>
<title>The Right Write - Login</title>
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


<!-- If a user is logged in, goes to home page. If user/pass input has been posted, attempts to log in. -->
<?php
	require_once './../Database/login.php';
	
	$failed = False;
	if (isset($_SESSION['uname'])) {
		goto_home();
	}

	else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		$_SESSION['uname'] = $_POST['username'];
		$_SESSION['pword'] = $_POST['password'];
		$_SESSION['type'] = check_credentials($un, $pw, $hostName, $database, $_SESSION['uname'], $_SESSION['pword']);
		
		if (($_SESSION['type'] == 'Customer') or ($_SESSION['type'] == 'Vendor') or ($_SESSION['type'] == 'Admin')) {
			goto_home();
		}
		else {
			session_start();
			$_SESSION = array();
			setcookie(session_name(), '', time() - 42000);
			session_destroy();
			$failed = True;
		}
	}
?>


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
    <p class="w3-left">Login</p>
    <p class="w3-right">
		<a href="HomePage.php">Home</a>
		<a href="AccountPage.php">Account</a>
		<?php
			session_start();
			if ($_SESSION['uname']) {
				echo '<a href="LogoutPage.php">Logout</a>';
			}
			else {
				echo '<a href="LoginPage.php">Login</a>';
			}
		?>
		<a href="CartPage.php">Cart (0)</a>
		<input type="text" placeholder="Search..">
    </p>
  </header>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
  
	<form method="post" action="LoginPage.php">
		<div class="w3-col l3 s6">
			<div class="w3-container">
				<p style="color: red">
					<?php
						if ($failed)
							echo 'Username or Password is incorrect.';
					?>
				</p>
			</div>
			<div class="w3-container">
				<p>Username<br></p>
			</div>
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
				<p>Don't have an account? <a href="CreateAccountPage.php">Create Account</a></p>
			</div>
		</div>
	</form>

  </div>
  
  <?php
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
	
	function goto_home() {
		header("Location: HomePage.php");
		exit;
	}
  ?>

</body>
</html>
