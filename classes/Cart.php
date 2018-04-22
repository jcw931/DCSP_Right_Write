<?php

/* * ************************************************************
 *  This file implements the Cart class. Functions of note include
 *  addItem() which adds an item to the cart, removeItem() which
 *  removes a selected item and placeOrder() which has not been
 *  finished.
 * ************************************************************ */

class Cart {
    private $items;
    private $customerID;

    public function __construct($newItems, $newCustomerID) {
        $this->items = $newItems;
        $this->customerID = $newCustomerID;
    }

    public function setItems($newItems) {
        foreach ($newItems as $item) {
            $this->items = $item;
        }
    }

    public function setCustomerID($newCustomerID) {
        $this->customerID = $newCustomerID;
    }

    public function getItems() {
        return $this->items;
    }

    public function getCustomerID() {
        return $this->customerID;
    }

    public function addItem($newItem) {
        $this->items = $newItem;
    }

    public function removeItem($item) {
        unset($this->items[array_search($item)]);
        $this->items = array_values($this->items);
    }

    // finish this function this is how we place orders
    public function placeOrder() {
        return;
    }
}
?>