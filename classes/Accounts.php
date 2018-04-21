<?php
/* Written by the Right Write Team */

/***********************************************************************************************
 *  This is the class for the general user account. All other accounts will inherit from this
 * parent class
 * **** SETS AND GETS ARE ONLY CURRENT FUNCTIONS ******
 ***********************************************************************************************/

require_once "Cart.php";

class UserAccount{
    private $userID;
    private $fname;
    private $lname;
    private $uname;
    private $passwd;
    private $email;

    public function __construct($uID, $first, $last, $user, $pw, $mail){
        $this -> userID = $uID;
        $this -> fname = $first;
        $this -> lname = $last;
        $this -> uname = $user;
        $this -> passwd = $pw;
        $this -> email = $mail;
    }

    public function setPassword($newPasswd){
        $this -> passwd = $newPasswd;
    }
    public function setUname($newUN){
        $this -> uname = $newUN;
    }
    public function setFname ($newFN){
        $this -> fname = $newFN;
    }
    public function setLname ($newLN){
        $this -> lname = $newLN;
    }
    public function setEmail($newMail) {
        $this -> email = $newMail;
    }
    public function getPassword(){
        return $this -> passwd;
    }
    public function getUname(){
        return $this -> uname;
    }
    public function getFname(){
        return $this -> fname;
    }
    public function getLname(){
        return $this -> lname;
    }
    public function getUID(){
        return $this -> userID;
    }
    public function getEmail(){
        return $this -> email;
    }
}

class Customer extends UserAccount {
    private $address; // varchar(150)
    private $cart; // the customers Cart
    private $cartID; // varchar(32)
    private $history = array();

    public function __construct($uID, $first, $last, $user, $pw, $mail, $addr, $cartID)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);
        $this->address = $addr;
        $this->cartID = $cartID;
        $this->cart = new Cart($cartID, $uID);


    }

    public function setAddress($newAddress) {
        $this->address = $newAddress;
    }

    public function setCartID($newCartID){
        $this -> cartID = $newCartID;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCartId(){
        return $this-> cartID;
    }

    public function getCart() {
        return $this->cart;
    }

    public function addHistory($Order){
        $this->history[] = $Order;
    }
}

class Vendor extends UserAccount {
    private $brand;

    public function __construct($uID, $first, $last, $user, $pw, $mail, $brand)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);
        $this -> brand = $brand;
    }
    public function setBrand($newBrand){
        $this -> brand = $newBrand;
    }
    public function getBrand(){
        return $this-> brand;
    }
}

class Admin extends UserAccount {

    public function __construct($uID, $first, $last, $user, $pw, $mail)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);
    }
}

?>