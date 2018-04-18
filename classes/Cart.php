<?php

/* * ************************************************************
 *  This file implements the Cart class. Functions of note include
 *  addItem() which adds an item to the cart, removeItem() which
 *  removes a selected item and placeOrder() which has not been
 *  finished.
 * ************************************************************ */

class Cart {
    private $cartID; // varchar(32)
    private $items = array(); // array of items in cart
    private $customerID; // customer id of cart owner

    // constructor does not set items array; there should be no items in cart at creation
    public function __construct($newCartID, $newCustomerID) {
        $this->cartID = $newCartID;
        $this->customerID = $newCustomerID;
    }

    // set cartID of Cart (string)
    public function setCartID($newCartID) {
        $this->cartID = $newCartID;
    }

    // ???? dont add multiple items at once
    public function setItems($newItems) {
        foreach ($newItems as $item) {
            $this->items = $item;
        }
    }

    // set customerID of Cart (string)
    public function setCustomerID($newCustomerID) {
        $this->customerID = $newCustomerID;
    }

    // returns cartID (string)
    public function getCartID() {
        return $this->cartID;
    }

    // returns array of Items in Cart (array)
    public function getItems() {
        return $this->items;
    }

    // returns customerID (string)
    public function getCustomerID() {
        return $this->customerID;
    }

    // add an item to the Cart (append to items array)
    public function addItem($newItem) {
        $this->items[] = $newItem;
    }

    //  remove an item from Cart (remove from items array)
    public function removeItem($item) {
        array_splice($this->items, array_search($item, $this->items), 1);
    }

    // finish this function this is how we place orders
    public function placeOrder() {
        return;
    }
}

?>