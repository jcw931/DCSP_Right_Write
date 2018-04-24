<!DOCTYPE html>
<html>
<title>Add Item - The Right Write</title>
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
    <p class="w3-left">Add Item</p>
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
				
				// If the user is a Vendor, creates a Vendor account object.
				if ($_SESSION['type'] == 'Vendor') {
					$result = allVendorData($un, $pw, $hostName, $database, $_SESSION['uname']);
					$account = new Vendor($result['vendorID'], $result['fname'], $result['lname'], $result['username'], $result['password'], $result['email'], $result['brand']);
				}
				// If the user is a Customer or Admin, redirects to "Vendor Only" page.
				else if (($_SESSION['type'] == 'Customer') || ($_SESSION['type'] == 'Admin'))
					goto_vendoronly();
				
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
    <p>Manage Your Inventory</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <div class="w3-col l3 s6">
	<?php
	
		require_once "displayFunctions.php";
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($_POST['utensil'] == "wooden_pencil"){
				$itemID = newID($un, $pw, $hostName, $database, "item");
				$name = $_POST['name'];
				$price = $_POST['price'];
				$qty = $_POST['stock'];
				$description = $_POST['desc'];
				$itemColor = $_POST['itemColor'];
				$brand = $account->getBrand();
				$number = $_POST['number'];
				$woodType = $_POST['wood_type'];
				$leadColor = $_POST['lead_color'];
				$imagePath = $_POST['image'];
				addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor,$imagePath );
				
				
			}
			else if ($_POST['utensil'] == "pen"){
				$itemID = newID($un, $pw, $hostName, $database, "item");
				$name = $_POST['name'];
				$price = $_POST['price'];
				$qty = $_POST['stock'];
				$description = $_POST['desc'];
				$itemColor = $_POST['itemColor'];
				$brand = $account->getBrand();
				$tipType = $_POST['tip_type'];
				$refill = $_POST['refill'];
				$inkColor = $_POST['ink_color'];
				$imagePath = $_POST['image'];
				addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath );
			}
			else if ($_POST['utensil'] == "mech_pencil"){
				$itemID = newID($un, $pw, $hostName, $database, "item");
				$name = $_POST['name'];
				$price = $_POST['price'];
				$qty = $_POST['stock'];
				$description = $_POST['desc'];
				$itemColor = $_POST['itemColor'];
				$brand = $account->getBrand();
				$gripType = $_POST['grip'];
				$leadWeight = $_POST['lead_weight'];
				$leadColor = $_POST['lead_color'];
				$imagePath = $_POST['image'];
				addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor,$imagePath );
			}
			
		}
		
		
		
		
	
	
	
	?>
	
	
	  
    </div>
  </div>
  
 <form method="post" action="AddVendorItem.php">

	<div class="w3-row w3-grayscale">
	
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
			
				<p><b>Type of Writing Utensil:</b></p>
				<p><select name="utensil">
					<option value="wooden_pencil">Wooden Pencil</option>
					<option value="mech_pencil">Mechanical Pencil</option>
					<option value="pen">Pen</option>
				</select></p>
				
			
			</div>
			
			<div class="w3-container">
			<p><b>Name of item: </b></p>
			<input type="text" name="name"><br>
			</div>
			
			<div class="w3-container">
				<p><b>What color is this item? </b></p>
				<p><input type="radio" name="itemColor" value="pink"> Pink<br>
				<input type="radio" name="itemColor" value="green"> Green<br>
				<input type="radio" name="itemColor" value="blue"> Blue<br>
				<input type="radio" name="itemColor" value="yellow"> Yellow<br>
				<input type="radio" name="itemColor" value="purple"> Purple<br>
				<input type="radio" name="itemColor" value="orange"> Orange<br>
				<input type="radio" name="itemColor" value="red"> Red<br>
				<input type="radio" name="itemColor" value="gray"> Gray<br>
				<input type="radio" name="itemColor" value="white"> White<br>
				<input type="radio" name="itemColor" value="black"> Black</p>
			</div>
			
			<div class="w3-container">
			<p><b>Description of item: </b></p>
			<input type="text" name="desc"><br>
			</div>
			
			<div class="w3-container">
			<p><b>Item Price? </b></p>
			<input type="text" name="price"><br>
			</div>
			
			<div class="w3-container">
			<p><b>How many would you like to add? </b></p>
			<input type="number" name="stock"><br>
			</div>
			
			<div class="w3-container">
				<p><input type="submit" value="Add Item"></p>
			</div>
			
		</div>
		
		<!-- Pen Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Pen Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Tip Type:</b></p>
				<p><select name="tip_type">
					<option value="ballpoint">Ballpoint</option>
					<option value="fountain">Fountain</option>
					<option value="gel">Gel</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Refillable:</b></p>
				<p><input type="radio" name="refill" value="1">Yes<br>
				<input type="radio" name="refill" value="0">No</p>
			</div>
			
			<div class="w3-container">
				<p><b>Ink Color:</b></p>
				<p><input type="radio" name="ink_color" value="pink">Pink<br>
				<input type="radio" name="ink_color" value="green">Green<br>
				<input type="radio" name="ink_color" value="blue">Blue<br>
				<input type="radio" name="ink_color" value="yellow">Yellow<br>
				<input type="radio" name="ink_color" value="purple">Purple<br>
				<input type="radio" name="ink_color" value="red">Red<br>
				<input type="radio" name="ink_color" value="white">White<br>
				<input type="radio" name="ink_color" value="black">Black</p>
			</div>
			
			<b>Pen Images:</b><br><br>
				<img src="images/pens/black_ballpoint_pen.png" alt="black_ballpoint_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/black_ballpoint_pen.png'><br>
				
				<img src="images/pens/blue_gel_pen.png" alt="blue_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value="images/pens/blue_gel_pen.png"><br>
				
				<img src="images/pens/fountain_pen.png" alt="cheap_fountain_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/fountain_pen.png'><br>
				
				<img src="images/pens/cross_bailey_fountain_pen.png" alt="cross_bailey_fountain_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/cross_bailey_fountain_pen.png'><br>
				
				<img src="images/pens/cross_bailey_red_ballpoint_pen.png" alt="cross_bailey_red_ballpoint_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/cross_bailey_red_ballpoint_pen.png'><br>
				
				<img src="images/pens/elegant_writing_pen.png" alt="elegant_writing_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/elegant_writing_pen.png'><br>
				
				<img src="images/pens/green_gel_pen.png" alt="green_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/green_gel_pen.png'><br>
				
				<img src="images/pens/papermate_red_ballpoint_pen.png" alt="papermate_red_ballpoint_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/papermate_red_ballpoint_pen.png'><br>
				
				<img src="images/pens/pilot_fountain_pen.png" alt="pilot_fountain_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/pilot_fountain_pen.png'><br>
				
				<img src="images/pens/pink_gel_pen.png" alt="pink_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/pink_gel_pen.png'><br>
				
				<img src="images/pens/purple_gel_pen.png" alt="purple_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/purple_gel_pen.png'><br>
				
				<img src="images/pens/staples_gel_pen.png" alt="staples_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/staples_gel_pen.png'><br>	
				
				<img src="images/pens/yellow_gel_pen.png" alt="yellow_gel_pen" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/pens/yellow_gel_pen.png'><br>
			
		</div>
		
		<!-- Wooden Pencil Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Wooden Pencil Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Pencil Number:</b></p>
				<p><input type="radio" name="number" value="1"> Number 1<br>
				<input type="radio" name="number" value="2"> Number 2<br>
				<input type="radio" name="number" value="3"> Number 3</p>
			</div>
			
			<div class="w3-container">
				<p><b>Wood Type:</b></p>
				<p><input type="radio" name="wood_type" value="cedar"> Cedar<br>
				<input type="radio" name="wood_type" value="oak"> Oak</p>
			</div>
			
			<div class="w3-container">
				<p><b>Lead Color:</b></p>
				<p><input type="radio" name="lead_color" value="pink"> Pink<br>
				<input type="radio" name="lead_color" value="green"> Green<br>
				<input type="radio" name="lead_color" value="blue"> Blue<br>
				<input type="radio" name="lead_color" value="yellow"> Yellow<br>
				<input type="radio" name="lead_color" value="purple"> Purple<br>
				<input type="radio" name="lead_color" value="orange"> Orange<br>
				<input type="radio" name="lead_color" value="red"> Red<br>
				<input type="radio" name="lead_color" value="gray"> Gray<br>
				<input type="radio" name="lead_color" value="white"> White<br>
				<input type="radio" name="lead_color" value="black"> Black</p>
			</div>
			
			<b>Wooden pencil images:</b><br><br>
				<img src="images/wooden_pencils/black_color_pencil.png" alt="Black Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/black_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/blue_color_pencil.png" alt="Blue Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/blue_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/green_color_pencil.png" alt="Green Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/green_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/pink_color_pencil.png" alt="Pink Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/pink_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/grey_color_pencil.png" alt="Grey Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/grey_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/purple_color_pencil.png" alt="Purple Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/purple_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/yellow_color_pencil.png" alt="Yellow Color Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/yellow_color_pencil.png'><br>
				
				<img src="images/wooden_pencils/wooden_pencil_1.png" alt="Wooden Pencil #1" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/wooden_pencil_1.png'><br>
				
				<img src="images/wooden_pencils/wooden_pencil_2.png" alt="Wooden Pencil #2" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/wooden_pencil_2.png'><br>
				
				<img src="images/wooden_pencils/wooden_pencil_3.png" alt="Wooden Pencil #3" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/wooden_pencils/wooden_pencil_3.png'><br><br>
			
		</div>
		
		<!-- Mechanical Pencil Categories -->
		<div class="w3-col l3 s6">
		
			<div class="w3-container">
				<p><b>Mechanical Pencil Categories:</b></p>
			</div>
			
			<div class="w3-container">
				<p><b>Grip Type:</b></p>
				<p><select name="grip">
					<option value="">----</option>
					<option value="grip">Grip</option>
					<option value="none">No Grip</option>
				</select></p>
			</div>
			
			<div class="w3-container">
				<p><b>Lead Weight:</b></p>
				<p><select name="lead_weight">
					<option value="">----</option>
					<option value="0.5">0.5</option>
					<option value="0.7">0.7</option>
					<option value="0.9">0.9</option>
				</select></p>
			</div>
			
			<b>Mechanical Pencil Images:</b><br><br>
				<img src="images/mechanical_pencils/alvin_mechanical_pencil.png" alt="Alvin Mechanical Pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/alvin_mechanical_pencil.png'><br>
				
				<img src="images/mechanical_pencils/deli_stationary_mechanical.png" alt="Deli stationary mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/deli_stationary_mechanical.png'><br>
				
				<img src="images/mechanical_pencils/good_mechanical_grip.png" alt="good mechanical grip pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/good_mechanical_grip.png'><br>
				
				<img src="images/mechanical_pencils/office_depot_mechanical.png" alt="office depot mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/office_depot_mechanical.png'><br>
				
				<img src="images/mechanical_pencils/papermate_mechanical_pencil.png" alt="papermate mechanical pencil" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/papermate_mechanical_pencil.png'><br>
				
				<img src="images/mechanical_pencils/papermate_write_bros_2.png" alt="papermate write bros" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/papermate_write_bros_2.png'><br>
				
				<img src="images/mechanical_pencils/pentel_sharp_mechanical_pencil.png" alt="pentel sharp mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/pentel_sharp_mechanical_pencil.png'><br>
				
				<img src="images/mechanical_pencils/porsche_tecflex_mech.png" alt="porsche tecflex" style=\"width:100px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/porsche_tecflex_mech.png'><br>
				
				<img src="images/mechanical_pencils/rotring_rapid_pro_mech.png" alt="rotring rapid pro" style=\"width:100px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/rotring_rapid_pro_mech.png'><br>
				
				<img src="images/mechanical_pencils/tropoika_construction_sketch_mechanical.png" alt="tropoika_construction_sketch_mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/tropoika_construction_sketch_mechanical.png'><br>
				
				<img src="images/mechanical_pencils/white_zebra_mechanical.png" alt="white_zebra_mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/white_zebra_mechanical.png'><br>
				
				<img src="images/mechanical_pencils/zebra_mini_mechanical.png" alt="zebra_mini_mechanical" style=\"width:400px;height:200px;\"><br>
				<input type='radio' name= "image" value='images/mechanical_pencils/zebra_mini_mechanical.png'><br><br>
			
		</div>
	
	</div>
	
</form>
 
<?php
	function goto_mustlogin() {
		header("Location: MustLoginPage.php");
		exit;
	}
	
	function goto_vendoronly() {
		header("Location: MustBeVendor.php");
		exit;
	}
?>

</body>
</html>