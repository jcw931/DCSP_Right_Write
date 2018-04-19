<?php

/* * ************************************************************
 *  This file implements the Order class. Class includes only
 *  getters and setters for the member variables. Also includes
 *  unfinished getInfo() function which returns all info???
 * ************************************************************ */

class Order {
    private $orderID; // varchar(32)
    private $items = array(); // array of items ordered
    private $customerID; // varchar(32)
    private $address; // varchar(32)
    private $date; // varchar(32)
    private $creditCard; // not stored in database

    public function __construct($newOrderID, $newItems, $newCustomerID, $newAddress, $newDate, $newCard) {
        $this->orderID = $newOrderID;
        foreach ($newItems as $item) {
            $this->items[] = $item;
        }
        $this->customerID = $newCustomerID;
        $this->address = $newAddress;
        $this->date = $newDate;
        $this->creditCard = $newCard;
    }

    // sets order ID (string)
    public function setOrderID($newOrderID) {
        $this->orderID = $newOrderID;
    }

    // sets items array
    public function setItems($newItems) {
        foreach ($newItems as $item) {
            $this->items = $item;
        }
    }

    // sets customer ID for Order (string)
    public function setCustomerID($newCustomerID) {
        $this->customerID = $newCustomerID;
    }

    // sets address for Order (string)
    public function setAddress($newAddress) {
        $this->address = $newAddress;
    }

    // sets date for Order (string)
    public function setDate($newDate) {
        $this->date = $newDate;
    }

    // sets credit card for Order (string)
    public function setCreditCard($newCard) {
        $this->creditCard = $newCard;
    }

    // returns order ID (string)
    public function getOrderID() {
        return $this->orderID;
    }

    // returns items array
    public function getItems() {
        return $this->items;
    }

    // returns customer ID (string)
    public function getCustomerID() {
        return $this->customerID;
    }

    // returns address (string)
    public function getAddress() {
        return $this->address;
    }

    // returns date (string)
    public function getDate() {
        return $this->date;
    }

    // returns credit card (string)
    public function getCreditCard() {
        return $this->creditCard;
    }

    // may come back to finish this function
    public function getInfo() {
        return;
    }

}
?>