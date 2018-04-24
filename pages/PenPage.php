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
require_once "displayFunctions.php";
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
        <p class="w3-left">Pens</p>
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
    displayAllPens($un, $pw, $hostName, $database);
    ?>

</body>
</html>