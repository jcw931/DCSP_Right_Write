<?php

/* * ************************************************************
 *  This file implements the Review class. Functions of note
 *  include edit() which allows a user to edit a posted review
 *  and delete() which allows a user to delete a posted review
 * ************************************************************ */

class Review {
    private $item; // varchar(32)
    private $customer; // varchar(32)
    private $message; // varchar(240)
    private $rating; // integer

    public function __construct($newItem, $newCustomer, $newMessage, $newRating) {
        $this->item = $newItem;
        $this->customer = $newCustomer;
        $this->message = $newMessage;
        $this->rating = $newRating;
    }

    // sets item of Review (string)
    public function setItem($newItem) {
        $this->item = $newItem;
    }

    // sets customer of Review (string)
    public function setCustomer($newCustomer) {
        $this->customer = $newCustomer;
    }

    // sets message of Review (string)
    public function setMessage($newMessage) {
        $this->message = $newMessage;
    }

    // sets rating of Review (integer)
    public function setRating($newRating) {
        $this->rating = $newRating;
    }

    // returns item (string)
    public function getItem() {
        return $this->item;
    }

    // returns customer (string)
    public function getCustomer() {
        return $this->customer;
    }

    // returns message (string)
    public function getMessage() {
        return $this->message;
    }

    // returns rating (integer 0 - 5)
    public function getRating() {
        return $this->rating;
    }

    // allows editing of review, takes message (string) and rating (integer 0-5)
    public function edit($newMessage, $newRating) {
        $this->setMessage($newMessage);
        $this->setRating($newRating);
    }

    // removes Review
    public function delete() {
        $this->item = NULL;
        $this->customer = NULL;
        $this->message = NULL;
        $this->rating = NULL;
        unset($this);
    }
}
?>