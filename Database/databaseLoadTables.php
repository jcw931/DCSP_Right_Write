<?PHP
//This is an initial load for the database. It is used for testing in the current state and only provides three of each inventory item class and one of each user for testing of DB function
//Written by: the Right Write group
//

require_once 'databaseController.php';
require_once 'login.php';

//startIDTracker($un, $pw, $hostName, $database, 'c1000', 'v1000', 'a1000', 'cart1000', 'item1000', 'order1000');


//adds Customers to the Database
$uname = "amy42";
$password = "password";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Amy";
$lname = "Talbot";
$email = "amy@amy.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "vjenkins23";
$password = "p@ssword";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Vivian";
$lname = "Jenkins";
$email = "viv@viv.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "tonyS";
$password = "pass";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Tony";
$lname = "Scott";
$email = "tony@tony.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "redlemons";
$password = "passwd";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Fred";
$lname = "Simmons";
$email = "fred@fred.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "light092";
$password = "goodPassword";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Laura";
$lname = "White";
$email = "lite@lite.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);

$uname = "freeUser";
$password = "freePass";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Edward";
$lname = "Freeman";
$email = "ed@free.com";
$ID = newID($un, $pw, $hostName, $database, "customer");
$cartID = newID($un, $pw, $hostName, $database, "cart");
$address = "123 CR 1234 Blah, BFE 123456";

addCustomer($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $cartID, $address);


//adds Vendors to the Database

$uname = "vendor1";
$password = "vendor1";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Jack";
$lname = "Vendsalot";
$email = "testVendor1@test.com";
$ID = newID($un, $pw, $hostName, $database, "vendor");
$brand = "Sharpie";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

$uname = "vendor2";
$password = "vendor2";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Jill";
$lname = "Vendsalot";
$email = "testVendor2@test.com";
$ID = newID($un, $pw, $hostName, $database, "vendor");
$brand = "Pilot";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

$uname = "vendor3";
$password = "vendor3";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "Geoph";
$lname = "Vendsalot";
$email = "testVendor3@test.com";
$ID = newID($un, $pw, $hostName, $database, "vendor");
$brand = "Precision";

addVendor($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID, $brand);

//adds Admins to the Database
$uname = "admin1";
$password = "admin1";
$psalt = "qm&h*" . $password . "pg!@";
$password = hash('ripemd128', $psalt);
$fname = "admin1";
$lname = "admin1";
$email = "testAdmin1@test.com";
$ID = newID($un, $pw, $hostName, $database, "admin");


addAdmin($un, $pw, $hostName, $database, $uname, $password, $fname, $lname, $email, $ID);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Wooden Pencil";
$price = 4;
$qty = 50;
$description = "It\'s a regular wooden pencil. What did you expect?";
$itemColor = "Yellow";
$brand = "pencil brand";
$number = 1;
$woodType = "Oak";
$leadColor = "black";
$imagePath = "insert imagepath";

addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Wooden Pencil";
$price = 8.80;
$qty = 100;
$description = "It\'s a regular wooden pencil. What did you expect?";
$itemColor = "blue";
$brand = "pencil brand";
$number = 3;
$woodType = "Oak";
$leadColor = "red";
$imagePath = "insert imagepath";

addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Wooden Pencil";
$price = 67;
$qty = 1;
$description = "It\'s a regular wooden pencil. What did you expect?";
$itemColor = "brown";
$brand = "pencil brand";
$number = 2;
$woodType = "Oak";
$leadColor = "purple";
$imagePath = "insert imagepath";

addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Wooden Pencil";
$price = .2;
$qty = 1000;
$description = "It\'s a regular wooden pencil. What did you expect?";
$itemColor = "blue";
$brand = "pencil brand";
$number = 2;
$woodType = "Oak";
$leadColor = "orange";
$imagePath = "insert imagepath";

addWoodenPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $number, $woodType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Mechanical Pencil";
$price = .2;
$qty = 1000;
$description = "It\'s a mechanical pencil! Pretty fancy!";
$itemColor = "blue";
$brand = "mechanical pencil brand";
$leadWeight = 0.5;
$gripType = "grip";
$leadColor = "orange";
$imagePath = "insert imagepath";

addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Mechanical Pencil";
$price = 200;
$qty = 34;
$description = "It\'s a mechanical pencil! Pretty fancy!";
$itemColor = "black";
$brand = "mechanical pencil brand";
$leadWeight = 0.7;
$gripType = "none";
$leadColor = "indigo";
$imagePath = "insert imagepath";

addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Mechanical Pencil";
$price = 45;
$qty = 90;
$description = "It\'s a mechanical pencil! Pretty fancy!";
$itemColor = "teal";
$brand = "mechanical pencil brand";
$leadWeight = 0.9;
$gripType = "grip";
$leadColor = "pink";
$imagePath = "insert imagepath";

addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Mechanical Pencil";
$price = 24;
$qty = 100;
$description = "It\'s a mechanical pencil! Pretty fancy!";
$itemColor = "blue";
$brand = "mechanical pencil brand";
$leadWeight = 0.5;
$gripType = "grip";
$leadColor = "orange";
$imagePath = "insert imagepath";

addMechanicalPencil($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $leadWeight, $gripType, $leadColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Pen";
$price = 20;
$qty = 100;
$description = "It\'s a pen....... Hooray?";
$itemColor = "blue";
$brand = "pen brand";
$tipType = "ballpoint";
$refill = "yes";
$inkColor = "orange";
$imagePath = "insert imagepath";

addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Pen";
$price = 22.34;
$qty = 10;
$description = "It\'s a pen....... Hooray?";
$itemColor = "black";
$brand = "pen brand";
$tipType = "fountain";
$refill = "yes";
$inkColor = "green";
$imagePath = "insert imagepath";

addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Pen";
$price = 20;
$qty = 100;
$description = "It\'s a pen....... Hooray?";
$itemColor = "red";
$brand = "pen brand";
$tipType = "gel";
$refill = "no";
$inkColor = "red";
$imagePath = "insert imagepath";

addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath);

$itemID = newID($un, $pw, $hostName, $database, "item");
$name = "Pen";
$price = 2000;
$qty = 450;
$description = "It\'s a pen....... Hooray?";
$itemColor = "blue";
$brand = "pen brand";
$tipType = "ballpoint";
$refill = "no";
$inkColor = "orange";
$imagePath = "insert imagepath";

addPen($un, $pw, $hostName, $database, $itemID, $name, $price, $qty, $description, $itemColor, $brand, $tipType, $refill, $inkColor, $imagePath);

$cartID = "cart1001";
$itemID = "i11009";
$itemQty = 23;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$cartID = "cart1001";
$itemID = "i11013";
$itemQty = 2;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$cartID = "cart1001";
$itemID = "i11002";
$itemQty = 24;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$cartID = "cart1002";
$itemID = "i11013";
$itemQty = 2;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$cartID = "cart1003";
$itemID = "i11016";
$itemQty = 100;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$cartID = "cart1003";
$itemID = "i11003";
$itemQty = 1;

addCart($un, $pw, $hostName, $database, $cartID, $itemID, $itemQty);

$orderID = newID($un, $pw, $hostName, $database, "order");
$customerID = "c1004";
$itemID = "i11015";
$date = "2012/05/06";
$itemQty = 20;
$itemPrice = 20;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$customerID = "c1004";
$itemID = "i11014";
$date = "2012/05/06";
$itemQty = 10;
$itemPrice = 22.34;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$orderID = newID($un, $pw, $hostName, $database, "order");
$customerID = "c1004";
$itemID = "i11015";
$date = "2013/07/07";
$itemQty = 40;
$itemPrice = 22;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$orderID = newID($un, $pw, $hostName, $database, "order");
$customerID = "c1005";
$itemID = "i11015";
$date = "2012/05/06";
$itemQty = 20;
$itemPrice = 23;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$orderID = newID($un, $pw, $hostName, $database, "order");
$customerID = "c1005";
$itemID = "i11015";
$date = "2012/05/06";
$itemQty = 20;
$itemPrice = 23;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$orderID = newID($un, $pw, $hostName, $database, "order");
$customerID = "c1006";
$itemID = "i11009";
$date = "2012/05/06";
$itemQty = 20;
$itemPrice = 23;

addToOrder($un, $pw, $hostName, $database, $orderID, $customerID, $itemID, $date, $itemQty, $itemPrice);

$orderID = "order1002";
$customerID = "c1004";

addHistory($un, $pw, $hostName, $database, $orderID, $customerID);

$orderID = "order1003";
$customerID = "c1004";

addHistory($un, $pw, $hostName, $database, $orderID, $customerID);

$orderID = "order1004";
$customerID = "c1005";

addHistory($un, $pw, $hostName, $database, $orderID, $customerID);

$orderID = "order1005";
$customerID = "c1005";

addHistory($un, $pw, $hostName, $database, $orderID, $customerID);

$orderID = "order1006";
$customerID = "c1006";

addHistory($un, $pw, $hostName, $database, $orderID, $customerID);

$customerID = "c1002";
$itemID = "i11010";
$numStars = 5;
$reviewText = "This item is the best!!!!!!!!";

addReview($un, $pw, $hostName, $database, $customerID, $itemID, $numStars, $reviewText);

$customerID = "c1002";
$itemID = "i11011";
$numStars = 1;
$reviewText = "This item is the worst!!!!!!!!";

addReview($un, $pw, $hostName, $database, $customerID, $itemID, $numStars, $reviewText);

$customerID = "c1003";
$itemID = "i11010";
$numStars = 3;
$reviewText = "This item is mediocre!!!!!!!!";

addReview($un, $pw, $hostName, $database, $customerID, $itemID, $numStars, $reviewText);

$customerID = "c1005";
$itemID = "i11006";
$numStars = 4;
$reviewText = "This item is pretty good!!!!!!!!";

addReview($un, $pw, $hostName, $database, $customerID, $itemID, $numStars, $reviewText);

$customerID = "c1006";
$itemID = "i11010";
$numStars = 3;
$reviewText = "This item is the best!!!!!!!!";

addReview($un, $pw, $hostName, $database, $customerID, $itemID, $numStars, $reviewText);


?>