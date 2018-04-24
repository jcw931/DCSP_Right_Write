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

        $wp = woodData($un, $pw, $hostName, $database, $cartRow['itemID']);
        $mp = mechData($un, $pw, $hostName, $database, $cartRow['itemID']);
        $pen = penData($un, $pw, $hostName, $database, $cartRow['itemID']);

        if(sizeof($wp) != 0){
           $itemCost = $wp[0]['qty'] * $wp[0]['price'];
           $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($mp) != 0){
            $itemCost = $mp[0]['qty'] * $mp[0]['price'];
            $totalCost = $totalCost + $itemCost;
        }
        else if(sizeof($pen) != 0){
            $itemCost = $pen[0]['qty'] * $pen[0]['price'];
            $totalCost = $totalCost + $itemCost;
        }
    }

    return $totalCost;
}

?>