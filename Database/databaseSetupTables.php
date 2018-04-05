<?php //This file is used to set up the database for The Right Write Website

require_once 'login.php'; //This file will contain the needed db name and account information needed to access the pluto PHPmyAdmin database
$connection = new mysqli($hostName, $un, $pw, $database);

if($connection->connect_error)
  die($connection->connect_error);

//Database table to hold all data for the "pen" inventory object
$query = "CREATE TABLE Pens (
  PRIMARY KEY itemID VARCHAR(32) NOT NULL UNIQUE,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  tipType VARCHAR(32) NOT NULL,
  refill INTEGER NOT NULL,
  inkColor VARCHAR(32) NOT NULL
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
  PRIMARY KEY itemID VARCHAR(32) NOT NULL UNIQUE,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  leadWeight FLOAT NOT NULL,
  gripType VARCHAR(32) NOT NULL,
  leadColor VARCHAR(32) NOT NULL
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
  PRIMARY KEY itemID VARCHAR(32) NOT NULL UNIQUE,
  name VARCHAR(80) NOT NULL,
  price FLOAT NOT NULL,
  qty INTEGER NOT NULL,
  description VARCHAR(240) NOT NULL,
  itemColor VARCHAR(32) NOT NULL,
  brand VARCHAR(32) NOT NULL,
  number INTEGER NOT NULL,
  woodType VARCHAR(32) NOT NULL,
  leadColor VARCHAR(32) NOT NULL
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
  PRIMARY KEY cartID VARCHAR(32) NOT NULL UNIQUE,
  FOREIGN KEY ItemID VARCHAR(32) NOT NULL,
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
  PRIMARY KEY customerID VARCHAR(32) NOT NULL UNIQUE,
  FOREIGN KEY CartID VARCHAR(32) NOT NULL,
  address VARCHAR (150) NOT NULL
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
  PRIMARY KEY vendorID VARCHAR(32) NOT NULL UNIQUE,
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
  PRIMARY KEY adminID VARCHAR(32) NOT NULL UNIQUE,
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
  PRIMARY KEY orderID VARCHAR(32) NOT NULL UNIQUE,
  FOREIGN KEY customerID VARCHAR(32) NOT NULL,
  FOREIGN KEY itemID VARCHAR(32) NOT NULL,
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
  FOREIGN KEY orderID VARCHAR(32) NOT NULL,
  FOREIGN KEY custoemrID VARCHAR(32) NOT NULL
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
  FOREIGN KEY customerID VARCHAR(32) NOT NULL,
  FOREIGN KEY itemID VARCHAR(32) NOT NULL,
  numStarts INTEGER NOT NULL,
  reviewTest VARCHAR(240) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "Review table created <br>";
}

$result->free();
$connection->close();

?>
