<?PHP
//This is an initial load for the database. It is used for testing in the current state and only provides three of each inventory item class and one of each user for testing of DB function
//Written by: the Right Write group
//

require_once 'databaseController.php';
require_once 'login.php';


addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "Customer";
$password = "password";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Jon";
$lname = "Doe";
$email = "jon_doe@gmail.com";
$ID = "c0004";
$cartID = "cart0004";
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);


//adds Vendors to the Database

$uname = "Vendor";
$password = "password";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Al";
$lname = "Gore";
$email = "goreal@test.com";
$ID = "v0004";
$brand = "AlGorePencils";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);


//adds Admins to the Database
$uname = "Admin";
$password = "password";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Ad";
$lname = "Min";
$email = "ad_min@test.com";
$ID = "a0002";


addAdmin($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID);


?>