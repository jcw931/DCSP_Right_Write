<?php

/**********************************************************
*  This file includes the inventory item
*
**********************************************************/
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
  
  public function setPrice ($newPrice) {
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
  
  public function setBrand ($newBrand) {
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

class Pen extends InventoryItem {

  
  
}

class WoodPen extends InventoryItem {
  
  
}

class MechPen extends InventoryItem {
  
  
}

class Crayon extends InventoryItem {
  
  
}
?>