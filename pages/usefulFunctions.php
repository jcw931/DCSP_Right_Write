<?php
require_once 'databaseContorller.php';

function cartTotal($un, $pw, $hostName, $database, $cartID){

    $totalCost = 0.00;
    $Cart = array();
    $Cart = allCartData($un, $pw, $hostName, $database, $cartID);
    $pen = array();
    $wp = array();
    $mp = array();


    foreach($Cart as $cartRow) {
        $itemCost = 0.00;

        $wp = woodData($un, $pw, $hostName, $database, $cartRow['itemID']);
        $mp = mechData($un, $pw, $hostName, $database, $cartRow['itemID']);
        $pen = penData($un, $pw, $hostName, $database, $cartRow['itemID']);

        if($wp){
           $itemCost = $wp['qty'] * $wp['price'];
           $totalCost = $totalCost + $itemCost;
        }
        else if($mp){
            $itemCost = $mp['qty'] * $mp['price'];
            $totalCost = $totalCost + $itemCost;
        }
        else if($pen){
            $itemCost = $pen['qty'] * $pen['price'];
            $totalCost = $totalCost + $itemCost;
        }
    }

    return $itemCost;
}


?>