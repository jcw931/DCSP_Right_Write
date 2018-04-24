<?php

require_once "./../Database/login.php";
require_once "./../Database/databaseController.php";

function displayAllWoodenPencils($un, $pw, $hostName, $database){
    $woodenPencilArr = array();
    $woodenPencilArr = allWoodenPencilData($un, $pw, $hostName, $database);

    echo "<table>";

    foreach ($woodenPencilArr as $woodenPencil ){
        echo "<tr>";
        $image = $woodenPencil['imagePath'];
        echo "<td>";
        echo "<image src=$image  style=\"width:500px;height:300px;\">";
		
        echo"</td>";

        echo "<td>";
        echo "<div id = \"item\">";

        echo "<br/>";

        echo "<b> Name: </b>".$woodenPencil['name'] ."<br/>";
        echo "<b> Description: </b>".$woodenPencil['description'] ."<br/>";
        echo "<b> Lead Weight: </b>".$woodenPencil['number'] ."   "."<b> Lead Color: </b>".$woodenPencil['leadColor'] ."   ";
        echo "<b> Wood Type: </b>".$woodenPencil['woodType'] ."<br/> "."<b> Item Color: </b>".$woodenPencil['itemColor'] ." "
            ."<b> Brand: </b>".$woodenPencil['brand'] ."<br/>";
        echo "<b> Price: </b>$".$woodenPencil['price'] ."<br/>";
        echo "<b> In Stock: </b>".$woodenPencil['qty'] ."<br/> <br/>";
		
        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";
}

function displayAllMechnicalPencils($un, $pw, $hostName, $database){
    $mechanicalPencilArr = array();
    $mechanicalPencilArr = allMechanicalPencilData($un, $pw, $hostName, $database);

    echo "<table>";

    foreach ($mechanicalPencilArr as $mechanicalPencil ){
        echo "<tr>";
        $image = $mechanicalPencil['imagePath'];
        echo "<td>";
        echo "<image src=$image style=\"width:500px;height:300px;\">";
        echo"</td>";

        echo "<td>";
        echo "<div id = \"item\">";

        echo "<br/>";

        echo "<b> Name: </b>".$mechanicalPencil['name'] ."<br/>";
        echo "<b> Description: </b>".$mechanicalPencil['description'] ."<br/>";
        echo "<b> Lead Weight: </b>".$mechanicalPencil['leadWeight'] ."   "."<b> Lead Color: </b>".$mechanicalPencil['leadColor'] ."   ";
        echo "<b> Grip Type: </b>".$mechanicalPencil['gripType'] ."<br/>"."<b> Item Color: </b>".$mechanicalPencil['itemColor'] ." "
            ."<b> Brand: </b>".$mechanicalPencil['brand'] ."<br/>";
        echo "<b> Price: </b>$".$mechanicalPencil['price'] ."<br/>";
        echo "<b> In Stock: </b>".$mechanicalPencil['qty'] ."<br/> <br/>";

        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";
}

function displayAllPens($un, $pw, $hostName, $database){
    echo "<table>";

    $penArr = array();
    $penArr = allPenData($un, $pw, $hostName, $database);

    foreach ($penArr as $pen ){
        echo "<tr>";
        $image = $pen['imagePath'];
        echo "<td>";
        echo "<image src=$image style=\"width:500px;height:300px;\">";
        echo"</td>";

        echo "<td>";
        echo "<div id = \"item\">";

        echo "<br/>";

        echo "<b> Name: </b>".$pen['name'] ."<br/>";
        echo "<b> Description: </b>".$pen['description'] ."<br/>";
        echo "<b> Tip Type: </b>".$pen['tipType'] ."   "."<b> Ink Color: </b>".$pen['inkColor'] ."   ";
        echo "<b> Refillable: </b>".$pen['refill'] ."<br/>"."<b> Item Color: </b>".$pen['itemColor'] ." "
            ."<b> Brand: </b>".$pen['brand'] ."<br/>";
        echo "<b> Price: </b>$".$pen['price'] ."<br/>";
        echo "<b> In Stock: </b>".$pen['qty'] ."<br/> <br/>";

        echo "</div>";
        echo "</td>";

        echo "<tr>";
    }

    echo "</table>";
}

function displaySinglePen($pen){
    echo "<table>";
    echo "<tr>";

    $image = $pen['imagePath'];

    echo "<td>";
    echo "<image src='$image'  style=\"width:500px;height:300px;\">";
    echo"</td>";

    echo "<td>";
    echo "<div id = \"item\">";

    echo "<br/>";

    echo "<b> Name: </b>".$pen['name'] ."<br/>";
    echo "<b> Description: </b>".$pen['description'] ."<br/>";
    echo "<b> Tip Type: </b>".$pen['tipType'] ."   "."<b> Ink Color: </b>".$pen['inkColor'] ."   ";
    echo "<b> Refillable: </b>".$pen['refill'] ."<br/>"."<b> Item Color: </b>".$pen['itemColor'] ." "
        ."<b> Brand: </b>".$pen['brand'] ."<br/>";
    echo "<b> Price: </b>$".$pen['price'] ."<br/>";
    echo "<b> In Stock: </b>".$pen['qty'] ."<br/> <br/>";

    echo "</div>";
    echo "</td>";

    echo "<tr>";
    echo "</table>";
}

function displaySingleWoodenPencil($woodenPencil){
	
    echo "<table>";
    echo "<tr>";
    $image = $woodenPencil['imagePath'];
    echo "<td>";
    echo "<image src=$image  style=\"width:500px;height:300px;\">";
    echo"</td>";
	

    echo "<td>";
    echo "<div id = \"item\">";

    echo "<br/>";

	
	
    echo "<b> Name: </b>".$woodenPencil['name'] ."<br/>";
    echo "<b> Description: </b>".$woodenPencil['description'] ."<br/>";
    echo "<b> Lead Weight: </b>".$woodenPencil['number'] ."   "."<b> Lead Color: </b>".$woodenPencil['leadColor'] ."   ";
    echo "<b> Wood Type: </b>".$woodenPencil['woodType'] ."<br/> "."<b> Item Color: </b>".$woodenPencil['itemColor'] ." "
        ."<b> Brand: </b>".$woodenPencil['brand'] ."<br/>";
    echo "<b> Price: </b>$".$woodenPencil['price'] ."<br/>";
    echo "<b> In Stock: </b>".$woodenPencil['qty'] ."<br/> <br/>";

    echo "</div>";
    echo "</td>";

    echo "<tr>";
    echo "</table>";
	
	
	
}

function displaySingleMechanicalPencil($mechanicalPencil){
    echo "<table>";
    echo "<tr>";
    $image = $mechanicalPencil['imagePath'];
    echo "<td>";
    echo "<image src=$image style=\"width:500px;height:300px;\">";
    echo"</td>";

    echo "<td>";
    echo "<div id = \"item\">";

    echo "<br/>";

    echo "<b> Name: </b>".$mechanicalPencil['name'] ."<br/>";
    echo "<b> Description: </b>".$mechanicalPencil['description'] ."<br/>";
    echo "<b> Lead Weight: </b>".$mechanicalPencil['leadWeight'] ."   "."<b> Lead Color: </b>".$mechanicalPencil['leadColor'] ."   ";
    echo "<b> Grip Type: </b>".$mechanicalPencil['gripType'] ."<br/>"."<b> Item Color: </b>".$mechanicalPencil['itemColor'] ." "
        ."<b> Brand: </b>".$mechanicalPencil['brand'] ."<br/>";
    echo "<b> Price: </b>$".$mechanicalPencil['price'] ."<br/>";
    echo "<b> In Stock: </b>".$mechanicalPencil['qty'] ."<br/> <br/>";

    echo "</div>";
    echo "</td>";

    echo "<tr>";

    echo "</table>";
}
?>