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
  inkColor VARCHAR (32) NOT NULL
)";

$result = $connection->query($query);
if(!$result){
  die($connection->error);
}
else {
  echo "tables created";
}

$result->free();
$connection->close();

?>
