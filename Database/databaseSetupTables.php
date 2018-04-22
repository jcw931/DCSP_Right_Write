<?php //This file is used to set up the database for The Right Write Website

require_once 'login.php'; //This file will contain the needed db name and account information needed to access the pluto PHPmyAdmin database
$connection = new mysqli($hostName, $un, $pw, $database);

if($connection->connect_error)
  die($connection->connect_error);

//Database table to hold all data for the "pen" inventory object
$query = "CREATE TABLE Pens (
  itemID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  tipType VARCHAR(32) NOT NULL,
  refill INTEGER NOT NULL,
  inkColor VARCHAR(32) NOT NULL,
  imagePath VARCHAR(80) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "pen table created <br>";
}

//Database table to hold all data for the "MechanicalPencil" invenotry object
$query = "CREATE TABLE MechanicalPencil (
  itemID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  leadWeight FLOAT NOT NULL,
  gripType VARCHAR(32) NOT NULL,
  leadColor VARCHAR(32) NOT NULL,
  imagePath VARCHAR(80) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "MechanicalPencil table created <br>";
}

//Database table to hold all data for the "WoodenPencil" invenotry object
$query = "CREATE TABLE WoodenPencil (
  itemID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  number INTEGER NOT NULL,
  woodType VARCHAR(32) NOT NULL,
  leadColor VARCHAR(32) NOT NULL,
  imagePath VARCHAR(80) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "WoodenPencil table created <br>";
}

//Database table to hold user cart database
$query = "CREATE TABLE Cart (
  cartID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  ItemID VARCHAR(32) NOT NULL,
  itemQty INTEGER NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Cart table created <br>";
}

//Database table to hold all customer data
$query = "CREATE TABLE Customers (
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL,
  fname VARCHAR(32) NOT NULL,
  lname VARCHAR(32) NOT NULL,
  email VARCHAR(50) NOT NULL,
  customerID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  cartID VARCHAR(32) NOT NULL,
  address VARCHAR(150) NOT NULL,
  hpItem VARCHAR (32)
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Customers table created <br>";
}

//Database table to hold all vendor data
$query = "CREATE TABLE Vendor (
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL,
  fname VARCHAR(32) NOT NULL,
  lname VARCHAR(32) NOT NULL,
  email VARCHAR(50) NOT NULL,
  vendorID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  brand VARCHAR(32) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Vendors table created <br>";
}

//Database table to hold all admin data
$query = "CREATE TABLE Admin (
  username VARCHAR(32) NOT NULL UNIQUE,
  password VARCHAR(32) NOT NULL,
  fname VARCHAR(32) NOT NULL,
  lname VARCHAR(32) NOT NULL,
  email VARCHAR(50) NOT NULL,
  adminID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "admin table created <br>";
}

//Databse table to hold past orders
$query = "CREATE TABLE Orders (
  orderID VARCHAR(32) NOT NULL UNIQUE PRIMARY KEY,
  customerID VARCHAR(32) NOT NULL,
  itemID VARCHAR(32) NOT NULL,
  date VARCHAR(32) NOT NULL,
  itemQty INTEGER NOT NULL,
  totalPrice FLOAT NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Orders table created <br>";
}

//Database table to hold customer order history
$query = "CREATE TABLE History (
  orderID VARCHAR(32) NOT NULL,
  customerID VARCHAR(32) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "History table created <br>";
}

//Datebase table to hold item reviews
$query = "CREATE TABLE Reviews (
  customerID VARCHAR(32) NOT NULL,
  itemID VARCHAR(32) NOT NULL,
  numStarts INTEGER NOT NULL,
  reviewText VARCHAR(240) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Review table created <br>";
}

$query  = "CREATE TABLE IDTracker (customerID VARCHAR(32) NOT NULL UNIQUE,
                                   vendorID VARCHAR(32) NOT NULL UNIQUE,
                                   adminID VARCHAR(32) NOT NULL UNIQUE,
                                   cartID VARCHAR(32) NOT NULL UNIQUE,
                                   itemID VARCHAR(32) NOT NULL UNIQUE,
                                   orderID VARCHAR(32) NOT NULL UNIQUE)";


$result = $connection->query($query);
if(!$result){
    die($connection->error);
}
else {
    echo "IDTracker table created <br>";
}

$result->close();
$connection->close();

?>
