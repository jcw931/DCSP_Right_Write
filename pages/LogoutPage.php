<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<head>
<style>
p.text {
	font-family: "Times New Roman", Times, serif;
	font-weight: bold;
	font-size: 29px;
}
	
</style>
</head>
<body>


<nav class="w3-bar w3-light-grey">
	<a href="HomePage.php" class="w3-button w3-bar-item"><img src="TheRightWrite.png" width = "600", height = "50"></a>
	<a href="HomePage.php" class="w3-button w3-bar-item"><img src="Home.png" width = "146", height = "50"></a>
	<a href="AccountPage.php" class="w3-button w3-bar-item"><img src="Account.png" width = "146", height = "50"></a>
	<?php
	if (true)
		echo '<a href="LogoutPage.php" class="w3-button w3-bar-item"><img src="Logout.png" width = "146", height = "50"></a>';
	else
		echo '<a href="LoginPage.php" class="w3-button w3-bar-item"><img src="Login.png" width = "146", height = "50"></a>';
	?>
	<a href="CartPage.php" class="w3-button w3-bar-item"><img src="Cart.png" width = "146", height = "50"></a>
	<div style="float:right" class="topnav">
	  <input type="text" placeholder="Search..">
	</div>
</nav>

<section class="w3-row-padding w3-center w3-white">
  <article class="w3-third">
    <p class="text">You have successfully logged out of your account.</p>
	<p><a href="HomePage.php"><img src="Home.png" width = "146", height = "50"></a>
	<a href="LoginPage.php"><img src="Login.png" width = "146", height = "50"></a></p>
  </article>
</section>






</body>
</html>