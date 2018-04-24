<?php
require_once 'databaseController.php';

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

        if(sizeof($wp) != 0){
           $itemCost = $cartRow['qty'] * $wp['price'];
           $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($mp) != 0){
            $itemCost = $cartRow['qty'] * $mp['price'];
            $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($pen) != 0){
            $itemCost = $cartRow['qty'] * $pen['price'];
            $totalCost = $totalCost + $itemCost;
        }
    }

    return $totalCost;
}

?>
