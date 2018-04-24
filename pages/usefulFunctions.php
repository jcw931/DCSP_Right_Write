<?php
require_once './../Database/databaseController.php';

function cartTotal($un, $pw, $hostName, $database, $cartID){

    $totalCost = 0.00;
    $Cart = array();
    $Cart = allCartData($un, $pw, $hostName, $database, $cartID);

    foreach($Cart as $cartRow) {
        $itemCost = 0.00;

        $pen = array();
        $wp = array();
        $mp = array();

        $wp = woodData($un, $pw, $hostName, $database, $cartRow['ItemID']);
        $mp = mechData($un, $pw, $hostName, $database, $cartRow['ItemID']);
        $pen = penData($un, $pw, $hostName, $database, $cartRow['ItemID']);

        if(sizeof($wp) != 0) {
           $itemCost = $cartRow['itemQty'] * $wp['price'];
           $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($mp) != 0){
            $itemCost = $cartRow['itemQty'] * $mp['price'];
            $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($pen) != 0){
            $itemCost = $cartRow['itemQty'] * $pen['price'];
            $totalCost = $totalCost + $itemCost;
        }
    }

    return $totalCost;
}

?>