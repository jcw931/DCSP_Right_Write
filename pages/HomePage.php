<!DOCTYPE html>
<html>
<title>Home - The Right Write</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheets/inventory.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:2400px">

<?php
require_once "./../Database/login.php";
require_once "./../Database/databaseController.php";
?>


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
    <p class="w3-left">Home</p>
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
		<a href="SearchPage.php">Search</a>
    </p>
  </header>

    <?php
    $woodenPencilArr = array();
    $woodenPencilArr = allWoodenPencilData($un, $pw, $hostName, $database);

    echo "<table>";

    foreach ($woodenPencilArr as $woodenPencil ){
        echo "<tr>";

        echo "<td>";
           echo "<image src=\"images/stockYellowPencil.png\"  style=\"width:500px;height:300px;\">";
        echo"</td>";

        echo "<td>";
        echo "<div id = \"woodenPencil\">";

        echo "<br/>";

            echo "<b> Name: </b>".$woodenPencil['name'] ."<br/>";
            echo "<b> Description: </b>".$woodenPencil['description'] ."<br/>";
            echo "<b> Lead Weight: </b>".$woodenPencil['number'] ."   "."<b> Lead Color: </b>".$woodenPencil['leadColor'] ."   ";
            echo "<b> Wood Type: </b>".$woodenPencil['woodType'] ."<br/>";
            echo "<b> Price: </b>$".$woodenPencil['price'] ."<br/>";
            echo "<b> In Stock: </b>".$woodenPencil['qty'] ."<br/> <br/>";

        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";


    $mechanicalPencilArr = array();
    $mechanicalPencilArr = allMechanicalPencilData($un, $pw, $hostName, $database);

    echo "<table>";

    foreach ($mechanicalPencilArr as $mechanicalPencil ){
        echo "<tr>";

        echo "<td>";
        echo "<image src=\"images/stockYellowPencil.png\"  style=\"width:500px;height:300px;\">";
        echo"</td>";

        echo "<td>";
        echo "<div id = \"woodenPencil\">";

        echo "<br/>";

        echo "<b> Name: </b>".$mechanicalPencil['name'] ."<br/>";
        echo "<b> Description: </b>".$mechanicalPencil['description'] ."<br/>";
        echo "<b> Lead Weight: </b>".$mechanicalPencil['leadWeight'] ."   "."<b> Lead Color: </b>".$mechanicalPencil['leadColor'] ."   ";
        echo "<b> Grip Type: </b>".$mechanicalPencil['gripType'] ."<br/>";
        echo "<b> Price: </b>$".$mechanicalPencil['price'] ."<br/>";
        echo "<b> In Stock: </b>".$mechanicalPencil['qty'] ."<br/> <br/>";

        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";

    echo "<table>";

    $penArr = array();
    $penArr = allPenData($un, $pw, $hostName, $database);

    foreach ($penArr as $pen ){
        echo "<tr>";

        echo "<td>";
        echo "<image src=\"images/stockYellowPencil.png\"  style=\"width:500px;height:300px;\">";
        echo"</td>";

        echo "<td>";
        echo "<div id = \"woodenPencil\">";

        echo "<br/>";

        echo "<b> Name: </b>".$pen['name'] ."<br/>";
        echo "<b> Description: </b>".$pen['description'] ."<br/>";
        echo "<b> Tip Type: </b>".$pen['tipType'] ."   "."<b> Ink Color: </b>".$pen['inkColor'] ."   ";
        echo "<b> Refillable: </b>".$pen['refill'] ."<br/>";
        echo "<b> Price: </b>$".$pen['price'] ."<br/>";
        echo "<b> In Stock: </b>".$pen['qty'] ."<br/> <br/>";

        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";

    ?>

</body>
</html>