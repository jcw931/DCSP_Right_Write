<?php
/**
 * Created by PhpStorm.
 * User: jcwro_000
 * Date: 4/18/2018
 * Time: 5:57 PM
 */

require_once 'login.php';
require_once  'databaseController.php';
/*
$itemID = "p00002";
$name = "that pen";
$price = 0.00;
$qty = 666;
$description = "A free pen that only writes in the blood of thy enemy";
$itemColor = "black No. 1";
$brand = "DeadlyScribe";
$tipType = "Deadly";
$refill = 1;
$inkColor = "blood red";
$imagePath = "you shouldnt look at me";

addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath );
*/
/*
$itemID = "w00001";
$name = "mini wooden stake";
$price = 0.00;
$qty = 666;
$description = "A free stake to help protect our customers from impending vampire attacks";
$itemColor = "wood colored";
$brand = "DeadlyScribe";
$number = "13";
$woodType = "oak";
$leadColor = "N/A";
$imagePath = "you shouldnt look at me";

addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor,$imagePath );
*/

/*
$itemID = "m00001";
$name = "mini Mechanical wooden stake";
$price = 0.00;
$qty = 666;
$description = "A free stake to help protect our customers from impending vampire attacks";
$itemColor = "wood colored";
$brand = "DeadlyScribe";
$leadWeight = .7;
$gripType = "metal";
$leadColor = "lead";
$imagePath = "you shouldnt look at me";

addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor,$imagePath );
*/

//read in from file
$inID = "c1000";
$number = ($inID[1] * 1000) + ($inID[2] * 100) + ($inID[3] * 10) + ($inID[4] * 1);
$number++;
$outID = $inID[0] .$number;
//write back to file

validUsernameData($un, $pw, $hostName, $database, 'Steve123');

$testArr = allPenData($un, $pw, $hostName, $database);



//startIDTracker($un, $pw, $hostName, $database, 'c1000', 'v1000', 'a1000', 'cart1000', 'i10000', 'order1000');

echo newID($un, $pw, $hostName, $database, 'customer') ."<br>";
echo newID($un, $pw, $hostName, $database, 'vendor') ."<br>";
echo newID($un, $pw, $hostName, $database, 'admin') ."<br>";
echo newID($un, $pw, $hostName, $database, 'item') ."<br>";
echo newID($un, $pw, $hostName, $database, 'cart') ."<br>";
echo newID($un, $pw, $hostName, $database, 'order') ."<br>";


?>