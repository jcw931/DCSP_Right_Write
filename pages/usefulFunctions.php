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
           $itemCost = $wp[0]['qty'] * $wp[0]['price'];
           $totalCost = $totalCost + $itemCost;
        }
        else if($mp){
            $itemCost = $mp[0]['qty'] * $mp[0]['price'];
            $totalCost = $totalCost + $itemCost;
        }
        else if($pen){
            $itemCost = $pen[0]['qty'] * $pen[0]['price'];
            $totalCost = $totalCost + $itemCost;
        }
    }

    return $itemCost;
}


?>