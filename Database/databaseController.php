<?php
/*************************************************************************************************************************************************************************
 * The following functions are for interaction with the database for the Right Write web application. These functions are the only interaction with the database
 * all other classes will use these in order to interact with it. This is to limit the points of interaction and minimize complexity of database functionality
 *
 * Written by: The Right Write group
 * Date: 04/11/18
 * ***********************************************************************************************************************************************************************/
require_once 'login.php';

/*******************************************************************************************
 *  This section of functions are for the Tables related to the Different user accounts
 *  Including the addition, removal, and editing of each.
 ********************************************************************************************/

/*********************************************************/
//CUSTOMER FUNCTIONS
function addCustomer($un, $pw, $hostName, $database, $username, $password, $fname, $lname, $email, $custID, $cartID, $addre){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "INSERT INTO Customers (username, password, fname, lname, email, customerID, cartID, address) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$custID', '$cartID', '$addre')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeCustomer($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "DELETE * FROM Customers WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editCustomer($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection - connect_error);
    }

    if($editField =="password"){
        $query = "UPDATE Customers SET password = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="lname"){
        $query = "UPDATE Customers SET lname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="fname"){
        $query = "UPDATE Customers SET fname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="cartID"){
        $query = "UPDATE Customers SET cartID = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="email"){
        $query = "UPDATE Customers SET email = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="address"){
        $query = "UPDATE Customers SET address = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
}


/***********************************************************/
//VENDOR FUNCTIONS
function addVendor($un, $pw, $hostName, $database, $username, $password, $fname, $lname, $email, $vendorID, $brand){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "INSERT INTO Vendor (username, password, fname, lname, email, vendorID, brand) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$vendorID', '$brand')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeVendor($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "DELETE * FROM Vendor WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editVendor($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection - connect_error);
    }

    if($editField =="password"){
        $query = "UPDATE Vendor SET password = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="lname"){
        $query = "UPDATE Vendor SET lname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="fname"){
        $query = "UPDATE Vendor SET fname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="email"){
        $query = "UPDATE Vendor SET email = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="brand"){
        $query = "UPDATE Vendor SET brand = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
}
/***********************************************************/
//ADMIN FUNCTIONS

function addAdmin($un, $pw, $hostName, $database, $username, $password, $fname, $lname, $email, $adminID){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "INSERT INTO Admin (username, password, fname, lname, email, adminID) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$adminID')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeAdmin($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection-connect_error);
    }

    $query  = "DELETE * FROM Admin WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editAdmin($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection - connect_error);
    }

    if($editField =="password"){
        $query = "UPDATE Admin SET password = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="lname"){
        $query = "UPDATE Admin SET lname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="fname"){
        $query = "UPDATE Admin SET fname = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
    else if($editField =="email"){
        $query = "UPDATE Admin SET email = '" .$newData ."' WHERE username = '" .$username ."'";
        $result = $connection->query($query);
        if (!$result) die($connection->error);
    }
}

?>

