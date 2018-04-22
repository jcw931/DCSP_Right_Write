<?php
/**************************************************************
*  This file includes the InventoryItem class as well as all
*  subclasses of inventory item (Pen, WoodPen, and MechPen).
**************************************************************/
class InventoryItem {
    private $id; //varchar(32)
    private $name; //varchar(80)
    private $price; //float
    private $quant; //int
    private $desc; //varchar(240)
    private $itemColor; //varchar(32)
    private $brand; //varchar(32)
    private $image; //varchar(80)
	
	public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage) {
    $this->id = $newID;
    $this->name = $newName;
    $this->price = $newPrice;
    $this->quant = $newQuantity;
    $this->desc = $newDescription;
    $this->itemColor = $newItemColor;
    $this->brand = $newBrand;
    $this->image = $newImage;
  }

  // sets id of Inventory Item (type: string)
  public function setID($newID) {
    $this->id = $newID;
  }

  // sets name of Inventory Item (type: string)
  public function setName($newName) {
	    // sets name of Inventory Item (type: string)
    $this->name = $newName;
  }

  // sets price of Inventory Item (type: float)
  public function setPrice($newPrice) {
    $this->price = $newPrice;
  }

  // sets quantity of Inventory Item (type: integer)
  public function setQuant($newQuantity) {
    $this->quant = $newQuantity;
  }

  // sets description of Inventory Item (type: string)
  public function setDesc($newDescription) {
    $this->desc = $newDescription;
  }

  // sets item color of Inventory Item (type: string)
  public function setItemColor($newItemColor) {
    $this->itemColor = $newItemColor;
  }

  // sets brand of Inventory Item (type: string)
  public function setBrand($newBrand) {
    $this->brand = $newBrand;
  }

  // sets path to image of Inventory Item (type: string)
  public function setImage($newImage) {
	    $this->image = $newImage;
  }

  // returns id (string)
  public function getID() {
    return $this->id;
  }

  // returns name (string)
  public function getName() {
    return $this->name;
  }

  // returns price (float)
  public function getPrice() {
    return $this->price;
  }

  // returns quantity (integer)
  public function getQuant() {
    return $this->quant;
  }

  // returns description (string)
  public function getDesc() {
    return $this->desc;
  }

  // returns item color (string)
  public function getItemColor() {
    return $this->itemColor;
  }

  // returns brand (string)
  public function getBrand() {
    return $this->brand;
  }

  // returns path to image (string)
  public function getImage() {
	    return $this->image;
  }
}

// class for pen items
class Pen extends InventoryItem {
  private $tipType; // varchar(32)
  private $refill; // integer (0 or 1)
  private $inkColor; // varchar(32)
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage, $newTipType, $newRefill, $newInkColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage);
    $this->tipType = $newTipType;
    $this->refill = $newRefill;
    $this->inkColor = $newInkColor;
  }

  // sets tip type for Pen (string)
  public function setTipType($newTip) {
    $this->tipType = $newTip;
  }

  // sets refillable for Pen (integer 0 or 1)
  public function setRefill($newRefill) {
    $this->refill = $newRefill;
  }

  // sets ink color for Pen (string)
  public function setInkColor($newInk) {
    $this->inkColor = $newInk;
  }

  // returns tip type (string)
  public function getTipType() {
    return $this->tipType;
  }

  // returns refillable (integer 0 or 1)
  public function getRefill() {
    return $this->refill;
  }

  // returns ink color (string)
  public function getInkColor() {
    return $this->inkColor;
  }
}

// class for wooden pencil items
class WoodPen extends InventoryItem {
  private $number; // integer
  private $woodType; // varchar(32)
  private $leadColor; // varchar(32)
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage, $newNumber, $newWood, $newLeadColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage);
    $this->number = $newNumber;
    $this->woodType = $newWood;
    $this->leadColor = $newLeadColor;
  }

  // sets number of Pencil (integer)
  public function setNumber($newNumber) {
    $this->number = $newNumber;
  }

  // sets wood type of Pencil (string)
  public function setWoodType($newWood) {
    $this->woodType = $newWood;
  }

  // sets lead color of Pencil (string)
  public function setLeadColor($newLeadColor) {
    $this->leadColor = $newLeadColor;
  }

  // returns number (integer)
  public function getNumber() {
    return $this->number;
  }

  // returns wood type (string)
  public function getWoodType() {
    return $this->woodType;
  }

  // returns lead color (string)
  public function getLeadColor() {
    return $this->leadColor;
  }
}

// class for mechanical pencil items
class MechPen extends InventoryItem {
  private $leadWeight; // float
  private $gripType; // varchar(32)
  private $leadColor; // varchar(32)
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage, $newWeight, $newGrip, $newLeadColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newImage);
    $this->leadWeight = $newWeight;
    $this->gripType = $newGrip;
    $this->leadColor = $newLeadColor;
  }

  // sets lead weight of MechPen (float)
  public function setLeadWeight($newWeight) {
    $this->leadWeight = $newWeight;
  }

  // sets grip type of MechPen (string)
  public function setGripType($newGrip) {
    $this->gripType = $newGrip;
  }

  // sets lead color of MechPen (string)
  public function setLeadColor($newLeadColor) {
    $this->leadColor = $newLeadColor;
  }

  // returns lead weight (float)
  public function getLeadWeight() {
    return $this->leadWeight;
  }

  // returns grip type (string)
  public function getGripType() {
    return $this->gripType;
  }

  // returns lead color (string)
  public function getLeadColor() {
    return $this->leadColor;
  } 
}
?>