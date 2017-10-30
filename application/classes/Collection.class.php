<?php

/**
* Collection class
**/

//namespace Core;

class Collection {
 private $items = array();

 public function addItem($obj, $key = null) {
  if ($key == null) {
   $this->items[] = $obj;
  } else {
   if (isset($this->items[$key])) {
    throw new KeyHasUseException("Key $key already in use.");
   } else {
    $this->items[$key] = $obj;
   }
  }
 }

 public function deleteItem($key) {
  if ($this->keyExists($key)) {
   unset($this->items[$key]);
  } else {
   throw new KeyInvalidException("Invalid key $key.");
  }
 }

 public function getItem($key) {
  if ($this->keyExists($key)) {
   return $this->items[$key];
  } else {
   throw new KeyInvalidException("Invalid key $key.");
  }
 }

 public function keys() {
  return array_keys($this->items);
 }

 /**
 * Get length of array $items
 * Input: empty
 * Output: integer
 **/
 public function length() {
  return count($this->items);
 }

 /**
 * Check if key exists in array $items
 * Input: string
 * Output: bulean
 **/
 public function keyExists($key) {
  return isset($this->items[$key]);
 }
}
