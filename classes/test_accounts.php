<?php
require_once "Accounts.php";
require_once "Cart.php";

// creates test_customer
$test_customer = new Customer("c0001", "Steve", "McCoolpants", "Steve123",
    "hisPassword", "test@test.com", "123 CR 1234 Blah BFE 123456", "cart0001");

// prints results of all get functions
echo $test_customer->getUID() . "<br>";
echo $test_customer->getFname() . "<br>";
echo $test_customer->getLname() . "<br>";
echo $test_customer->getUname() . "<br>";
echo $test_customer->getEmail() . "<br>";
echo $test_customer->getPassword() . "<br>";
echo $test_customer->getCartID() . "<br>";

// examples of using sets
$test_customer->setFname("first");
$test_customer->setLname("last");
$test_customer->setUname("usersrsrsr");
$test_customer->setEmail("thenewemail");
$test_customer->setPassword("thenewpass");
$test_customer->setCartID("thethehthehtehthetheh");

// test that sets worked
echo $test_customer->getUID() . "<br>";
echo $test_customer->getFname() . "<br>";
echo $test_customer->getLname() . "<br>";
echo $test_customer->getUname() . "<br>";
echo $test_customer->getEmail() . "<br>";
echo $test_customer->getPassword() . "<br>";
echo $test_customer->getCartID() . "<br>";

// this is how you access customer carts to add item
$test_customer->getCart()->addItem("item1");
$test_customer->getCart()->addItem("item2");

// must set result of get items to a temporary variable in order to index through
$items = $test_customer->getCart()->getItems();

// prints all items in cart
foreach ($items as $item) {
    echo "$item <br>";
}
// removing item2
$test_customer->getCart()->removeItem("item2");

// must set result of get items to a temporary variable in order to index through
$items = $test_customer->getCart()->getItems();

// prints all items in cart
foreach ($items as $item) {
    echo "$item <br>";
}

echo "<br>";

// create test_vendor
$test_vendor = new Vendor("v0001", "Jack", "Vendsalot", "vendor1", "vendor1",
    "testVendor1@test.com", "Precision");

// print results of all get functions
echo $test_vendor->getUID() . "<br>";
echo $test_vendor->getFname() . "<br>";
echo $test_vendor->getLname() . "<br>";
echo $test_vendor->getUname() . "<br>";
echo $test_vendor->getEmail() . "<br>";
echo $test_vendor->getPassword() . "<br>";
echo $test_vendor->getBrand() . "<br>";

// example of sets
$test_vendor->setUname("newUN");
$test_vendor->setFname("first");
$test_vendor->setLname("last");
$test_vendor->setUname("usersrsrsr");
$test_vendor->setEmail("thenewemail");
$test_vendor->setPassword("thenewpass");
$test_vendor->setBrand("thethehthehtehthetheh");

// test to make sure vendor sets worked
echo $test_vendor->getUID() . "<br>";
echo $test_vendor->getFname() . "<br>";
echo $test_vendor->getLname() . "<br>";
echo $test_vendor->getUname() . "<br>";
echo $test_vendor->getEmail() . "<br>";
echo $test_vendor->getPassword() . "<br>";
echo $test_vendor->getBrand() . "<br>";

// admin can be used in the same way as vendor; see vendor example
?>