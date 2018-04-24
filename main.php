<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> The Right Write </title>
</head>
<body>

<?php
	// Goes to home page
	goto_home();
	
	function goto_home() {
		header("Location: pages/HomePage.php");
		exit;
	}
?>

</body>
</html>