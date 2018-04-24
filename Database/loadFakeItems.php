<?php
	require_once "databaseController.php";
	require_once "login.php";
	
	addPen($un, $pw, $hostName, $database, "p0001", "Pen1", "21.99", "100", "Birbs1", "green", "Pen 15", "ballpoint", "1", "red", "NULL");
	addPen($un, $pw, $hostName, $database, "p0002", "Pen2", "22.99", "200", "Birbs2", "blue", "Pen 16", "fountain", "0", "black", "NULL");
	addPen($un, $pw, $hostName, $database, "p0003", "Pen3", "23.99", "300", "Birbs3", "red", "Pen 17", "gel", "1", "blue", "NULL");
	
	addWoodenPencil($un, $pw, $hostName, $database, "w0001", "WoodPencil1", "11.99", "10", "The First Write Choice", "red", "Crayola", "1", "cedar", "gray", "NULL");
	addWoodenPencil($un, $pw, $hostName, $database, "w0002", "WoodPencil2", "12.99", "20", "The Second Write Choice", "green", "Not Crayola", "2", "oak", "green", "NULL");
	addWoodenPencil($un, $pw, $hostName, $database, "w0003", "WoodPencil3", "13.99", "30", "The Third Write Choice", "blue", "Still Not Crayola", "3", "cedar", "blue", "NULL");
	
	addMechanicalPencil($un, $pw, $hostName, $database, "m0001", "MechPencil1", "1.99", "1", "Bees1", "blue", "Pen Cil", "0.5", "Grip", "gray", "NULL");
	addMechanicalPencil($un, $pw, $hostName, $database, "m0002", "MechPencil2", "2.99", "2", "Bees2", "red", "Cil Pen", "0.7", "None", "gray", "NULL");
	addMechanicalPencil($un, $pw, $hostName, $database, "m0003", "MechPencil3", "3.99", "3", "Bees3", "green", "CilllPen", "0.9", "Grip", "gray", "NULL");
	
?>