<?php
/* Written by the Right Write Team */

/***********************************************************************************************
 *  This is the class for the general user account. All other accounts will inherit from this
 * parent class
 * **** SETS AND GETS ARE ONLY CURRENT FUNCTIONS ******
 ***********************************************************************************************/

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
    public function setUsername($newUN){
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
    public function getPassword (){
        return $this -> passwd;
    }
    public function getUname (){
        return $this -> uname;
    }
    public function getFname (){
        return $this -> fname;
    }
    public function getLname (){
        return $this -> lname;
    }
    public function getUID (){
        return $this -> userID;
    }
    public function getEmail (){
        return $this -> email;
    }
}

class Customer extends UserAccount {
    private $cartID;
    private $history;

    public function __construct($uID, $first, $last, $user, $pw, $mail, $cartID)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);

        $this -> cartID = $cartID;
        $this -> $history = array();
    }

    public function setCartID($newCartID){
        $this -> cartID = $newCartID;
    }
    public function getCartId(){
        return $this-> cartID;
    }
    public function addHistory($Order){
        //add me later plz
    }
}

class Vendor extends UserAccount {
    private $companyID;

    public function __construct($uID, $first, $last, $user, $pw, $mail, $companyID)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);
        $this -> companyID = $companyID;
    }
    public function setCompanyID($newCompany){
        $this -> companyID = $newCompany;
    }
    public function getCompanyID(){
        return $this-> companyID;
    }
}

class Admin extends UserAccount {

    public function __construct($uID, $first, $last, $user, $pw, $mail)
    {
        parent::__construct($uID, $first, $last, $user, $pw, $mail);
    }
}