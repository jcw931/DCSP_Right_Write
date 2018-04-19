<?PHP
//This is an initial load for the database. It is used for testing in the current state and only provides three of each inventory item class and one of each user for testing of DB function
//Written by: the Right Write group
//

require_once 'databaseController.php';
require_once 'login.php';

//adds Customers to the Database
$uname = "Steve123";
$password = "hisPassword";
$fname = "Steve";
$lname = "McCoolpants";
$email = "test@test.com";
$ID = "c0001";
$cartID = "cart0001";
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "Sally123";
$password = "herPassword";
$fname = "Sally";
$lname = "McCoolpants";
$email = "test@test.com";
$ID = "c0002";
$cartID = "cart0002";
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "RadBart";
$password = "thePassword";
$fname = "Bart";
$lname = "Simpson";
$email = "test@test.com";
$ID = "c0003";
$cartID = "cart0003";
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);


//adds Vendors to the Database

$uname = "vendor1";
$password = "vendor1";
$fname = "Jack";
$lname = "Vendsalot";
$email = "testVendor1@test.com";
$ID = "v0001";
$brand = "Sharpie";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

$uname = "vendor2";
$password = "vendor2";
$fname = "Jill";
$lname = "Vendsalot";
$email = "testVendor2@test.com";
$ID = "v0002";
$brand = "Pilot";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

$uname = "vendor3";
$password = "vendor3";
$fname = "Geoph";
$lname = "Vendsalot";
$email = "testVendor3@test.com";
$ID = "v0003";
$brand = "Precision";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

//adds Admins to the Database
$uname = "admin1";
$password = "admin1";
$fname = "admin1";
$lname = "admin1";
$email = "testAdmin1@test.com";
$ID = "a0001";


addAdmin($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID);


?>