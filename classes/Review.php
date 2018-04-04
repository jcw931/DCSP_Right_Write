<?php

/* * ************************************************************
 *  This file implements the Review class. Functions of note
 *  include edit() which allows a user to edit a posted review
 *  and delete() which allows a user to delete a posted review
 * ************************************************************ */

class Review {
    private $item;
    private $customer;
    private $message;
    private $rating;

    public function __construct($newItem, $newCustomer, $newMessage, $newRating) {
        $this->item = $newItem;
        $this->customer = $newCustomer;
        $this->message = $newMessage;
        $this->rating = $newRating;
    }

    public function setItem($newItem) {
        $this->item = $newItem;
    }

    public function setCustomer($newCustomer) {
        $this->customer = $newCustomer;
    }

    public function setMessage($newMessage) {
        $this->message = $newMessage;
    }

    public function setRating($newRating) {
        $this->rating = $newRating;
    }

    public function getItem() {
        return $this->item;
    }

    public function getCustomer() {
        return $this->customer;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getRating() {
        return $this->rating;
    }

    public function edit($newMessage, $newRating) {
        $this->setMessage($newMessage);
        $this->setRating($newRating);
    }

    public function delete() {
        $this->item = NULL;
        $this->customer = NULL;
        $this->message = NULL;
        $this->rating = NULL;
        unset($this);
    }
}
?>