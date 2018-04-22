<?php

/* * ************************************************************
 *  This file implements the Order class. Class includes only
 *  getters and setters for the member variables. Also includes
 *  unfinished getInfo() function which returns all info???
 * ************************************************************ */

class Order {
    private $items;
    private $customerID;
    private $address;
    private $date;
    private $creditCard;

    public function __construct($newItems, $newCustomerID, $newAddress, $newDate, $newCard) {
        $this->items = $newItems;
        $this->customerID = $newCustomerID;
        $this->address = $newAddress;
        $this->date = $newDate;
        $this->creditCard = $newCard;
    }

    public function setItems($newItems) {
        foreach ($newItems as $item) {
            $this->items = $item;
        }
    }

    public function setCustomerID($newCustomerID) {
        $this->customerID = $newCustomerID;
    }

    public function setAddress($newAddress) {
        $this->address = $newAddress;
    }

    public function setDate($newDate) {
        $this->date = $newDate;
    }

    public function setCreditCard($newCard) {
        $this->creditCard = $newCard;
    }

    public function getItems() {
        return $this->items;
    }

    public function getCustomerID() {
        return $this->customerID;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCreditCard() {
        return $this->creditCard;
    }

    // may come back to finish this function
    public function getInfo() {
        return;
    }

}
?>