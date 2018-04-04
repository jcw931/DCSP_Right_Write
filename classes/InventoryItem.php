<?php
/**************************************************************
*  This file includes the InventoryItem class as well as all
*  subclasses of inventory item (Pen, WoodPen, and MechPen).
**************************************************************/
class InventoryItem {
  private $id;
	private $name;
  private $price;
  private $quant;
  private $desc;
  private $itemColor;
  private $brand;
	
	public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand) {   
    $this->id = $newID;
    $this->name = $newName;
    $this->price = $newPrice;
    $this->quant = $newQuantity;
    $this->desc = $newDescription;
    $this->itemColor = $newItemColor;
    $this->brand = $newBrand;
  }
  
  public function setID($newID) {
    $this->id = $newID;
  }
  
  public function setName($newName) {
    $this->name = $newName;
  }
  
  public function setPrice($newPrice) {
    $this->price = $newPrice;
  }
  
  public function setQuant($newQuantity) {
    $this->quant = $newQuantity;
  }
  
  public function setDesc($newDescription) {
    $this->desc = $newDescription;
  }
  
  public function setItemColor($newItemColor) {
    $this->color = $newColor;
  }
  
  public function setBrand($newBrand) {
    $this->brand = $newBrand;
  }
  
  public function getID() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getPrice() {
    return $this->price;
  }
  
  public function getQuant() {
    return $this->quant;
  }
  
  public function getDesc() {
    return $this->desc;
  }
  
  public function getItemColor() {
    return $this->itemColor;
  }
  
  public function getBrand() {
    return $this->brand;
  }
}

// class for pen items
class Pen extends InventoryItem {
  private $tipType;
  private $refill;
  private $inkColor;
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newTipType, $newRefill, $newInkColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand);
    $this->tipType = $newTipType;
    $this->refill = $newRefill;
    $this->inkColor = $newInkColor;
  }
  
  public function setTipType($newTip) {
    $this->tipType = $newTip;
  }
  
  public function setRefill($newRefill) {
    $this->refill = $newRefill;
  }
  
  public function setInkColor($newInk) {
    $this->inkColor = $newInk;
  }
  
  public function getTipType() {
    return $this->tipType;
  }
  
  public function getRefill() {
    return $this->refill;
  }
  
  public function getInkColor() {
    return $this->inkColor;
  }
}

// class for wooden pencil items
class WoodPen extends InventoryItem {
  private $number;
  private $woodType;
  private $leadColor;
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newNumber, $newWood, $newLeadColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand);
    $this->number = $newNumber;
    $this->woodType = $newWood;
    $this->leadColor = $newLeadColor;
  }
  
  public function setNumber($newNumber) {
    $this->number = $newNumber;
  }
  
  public function setWoodType($newWood) {
    $this->woodType = $newWood;
  }
  
  public function setLeadColor($newLeadColor) {
    $this->leadColor = $newLeadColor;
  }
  
  public function getNumber() {
    return $this->number;
  }
  
  public function getWoodType() {
    return $this->woodType;
  }
  
  public function getLeadColor() {
    return $this->leadColor;
  }
}

// class for mechanical pencil items
class MechPen extends InventoryItem {
  private $leadWeight;
  private $gripType;
  private $leadColor;
  
  public function __construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand, $newWeight, $newGrip, $newLeadColor) {
    parent::__construct($newID, $newName, $newPrice, $newQuantity, $newDescription, $newItemColor, $newBrand);
    $this->leadWeight = $newWeight;
    $this->gripType = $newGrip;
    $this->leadColor = $newLeadColor;
  }
  
  public function setLeadWeight($newWeight) {
    $this->leadWeight = $newWeight;
  }
  
  public function setGripType($newGrip) {
    $this->gripType = $newGrip;
  }
  
  public function setLeadColor($newLeadColor) {
    $this->leadColor = $newLeadColor;
  }
  
  public function getLeadWeight() {
    return $this->leadWeight;
  }
  
  public function getGripType() {
    return $this->gripType;
  }
  
  public function getLeadColor() {
    return $this->leadColor;
  } 
}
?>