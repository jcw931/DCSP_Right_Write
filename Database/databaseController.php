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
        die($connection->connect_error);
    }

    $query  = "INSERT INTO Customers (username, password, fname, lname, email, customerID, cartID, address) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$custID', '$cartID', '$addre')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeCustomer($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM Customers WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editCustomer($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
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

function allCustomerData($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM Customers WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $result->data_seek(0);
    $custArray = $result->fetch_array(MYSQLI_ASSOC);

    return $custArray;
}

function validCustomerUsername($un, $pw, $hostName, $database, $username){
    $valid = false;

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }
    $query = "SELECT username FROM Customers ";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row['username'] == $username) {
            $valid = true;
        }
    }

    return $valid;
}

/***********************************************************/
//VENDOR FUNCTIONS
function addVendor($un, $pw, $hostName, $database, $username, $password, $fname, $lname, $email, $vendorID, $brand){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "INSERT INTO Vendor (username, password, fname, lname, email, vendorID, brand) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$vendorID', '$brand')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeVendor($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM Vendor WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editVendor($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
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

function allVendorData($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM Vendor WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $result->data_seek(0);
    $vendArray = $result->fetch_array(MYSQLI_ASSOC);

    return $vendArray;
}

function validVendorUsername($un, $pw, $hostName, $database, $username){
    $valid = false;

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }
    $query = "SELECT username FROM Vendor ";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row['username'] == $username) {
            // echo "valid uname!!";
            $valid = true;
        }
    }

    return $valid;
}
/***********************************************************/
//ADMIN FUNCTIONS

function addAdmin($un, $pw, $hostName, $database, $username, $password, $fname, $lname, $email, $adminID){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "INSERT INTO Admin (username, password, fname, lname, email, adminID) "
        . "VALUES('$username', '$password', '$fname', '$lname' ,'$email', '$adminID')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeAdmin($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM Admin WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function editAdmin($un, $pw, $hostName, $database, $username, $editField, $newData){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
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

function allAdminData($un, $pw, $hostName, $database, $username){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM Admin WHERE username = '" .$username ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $result->data_seek(0);
    $adminArray = $result->fetch_array(MYSQLI_ASSOC);

    return $adminArray;
}

function validAdminUsername($un, $pw, $hostName, $database, $username){
    $valid = false;

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }
    $query = "SELECT username FROM Admin ";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row['username'] == $username) {
            $valid = true;
        }
    }

    return $valid;
}

/***********************************************************/
//Pen FUNCTIONS

function addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath ){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "INSERT INTO Pens (itemID, name, price, qty, description, itemColor, brand, tipType, refill, inkColor, imagePath) "
        . "VALUES('$itemID', '$name', '$price', '$qty', '$description', '$itemColor', '$brand', '$tipType', '$refill', '$inkColor', '$imagePath')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removePen($un, $pw, $hostName, $database, $itemID){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM Pens WHERE itemID = '" .$itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function penSearchAllData($un, $pw, $hostName, $database, $name){
    $onePenArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM Pens WHERE name = '" .$name ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $onePenArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $onePenArray;
}

function allPenData($un, $pw, $hostName, $database){
    $penArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    $query = "SELECT * FROM Pens";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $penArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $penArray;
}

/***********************************************************/
//WoodenPencil FUNCTIONS

function addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor,$imagePath ){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "INSERT INTO WoodenPencil (itemID, name, price, qty, description, itemColor, brand, number, woodType, leadColor, imagePath) "
        . "VALUES('$itemID', '$name', '$price', '$qty', '$description', '$itemColor', '$brand', '$number', '$woodType', '$leadColor', '$imagePath')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeWoodenPencil($un, $pw, $hostName, $database, $itemID){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM WoodenPencils WHERE itemID = '" .$itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function woodenPencilsSearchAllData($un, $pw, $hostName, $database, $name){
    $oneWpArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM WoodenPencils WHERE name = '" .$name ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $oneWpArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $oneWpArray;
}

function allWoodenPencilData($un, $pw, $hostName, $database){
    $wpArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    $query = "SELECT * FROM WoodenPencils";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $wpArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $wpArray;
}

/***********************************************************/
//MechanicalPencil FUNCTIONS
function addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor,$imagePath ){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "INSERT INTO MechanicalPencil (itemID, name, price, qty, description, itemColor, brand, leadWeight, gripType, leadColor, imagePath) "
        . "VALUES('$itemID', '$name', '$price', '$qty', '$description', '$itemColor', '$brand', '$leadWeight', '$gripType', '$leadColor', '$imagePath')";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function removeMechanicalPencil($un, $pw, $hostName, $database, $itemID){
    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error){
        die($connection->connect_error);
    }

    $query  = "DELETE  FROM MechanicalPencils WHERE itemID = '" .$itemID ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);
}

function mechanicalPencilsSearchAllData($un, $pw, $hostName, $database, $name){
    $oneMpArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if($connection->connect_error) {
        die($connection -> connect_error);
    }

    $query = "SELECT * FROM MechanicalPencils WHERE name = '" .$name ."'";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $oneMpArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $oneMpArray;
}

function allMechanicalPencilData($un, $pw, $hostName, $database){
    $mpArray = array();

    $connection = new mysqli($hostName, $un, $pw, $database);
    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    $query = "SELECT * FROM MechanicalPencils";

    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $mpArray[$j] = $result->fetch_array(MYSQLI_ASSOC);
    }

    return $mpArray;
}

/************************************************************************************************************************/
function validUsernameData($un, $pw, $hostName, $database, $username){
    if(validCustomerUsername($un, $pw, $hostName, $database, $username)){
        return allCustomerData($un, $pw, $hostName, $database, $username);
    }
    else if(validVendorUsername($un, $pw, $hostName, $database, $username)){
        return allVendorData($un, $pw, $hostName, $database, $username);
    }
    else if(validAdminUsername($un, $pw, $hostName, $database, $username)){
        return allAdminData($un, $pw, $hostName, $database, $username);
    }
    else{
        return false;
    }
}

function existingUsername($un, $pw, $hostName, $database, $username){
    if(validCustomerUsername($un, $pw, $hostName, $database, $username)){
        return true;
    }
    else if(validVendorUsername($un, $pw, $hostName, $database, $username)){
        return true;
    }
    else if(validAdminUsername($un, $pw, $hostName, $database, $username)){
        return true;
    }
    else{
        return false;
    }
}

?>

