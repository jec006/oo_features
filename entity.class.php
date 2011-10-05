<?php

abstract class Entity
{
  // Represents fields attached to this entity - is an array of things that extend Field
  public $fields;
  
  // A subclass of entity might have some more properties - for example, a bundle/type field, a machine name, ect.
  
  //Constructor 
  public function __construct(){
    $this->fields = array();
  }
  
  /**
   *  Add a field to the entity. This function is provided so that subclasses can override and add more functionality
   *  $field - A Field object to add
   */
  public function addField(Field $field){
    if (!isset($this->fields[$field->name])) {
      $this->fields[$field->name] = $field;
      return TRUE;
    } 
    else {
      return FALSE;
    }
  }
  
  /**
   *  Remove a field from the entity. This function is provided so that subclasses can override and add more functionality
   *  $field - A Field object to remove
   */
  public function removeField(Field $field){
    if(isset($this->fields[$field->name])){
      $this->fields[$field->name];
      delete($this->fields[$field->name]);
      return TRUE;
    } else {
      return FALSE;
    }
  }
  
  public function getField($name){
    return isset($this->fields[$name]) ? $this->fields[$name] : FALSE;
  }
  
  /**
   *  This function should save the entity type to the database
   *  It should call Field->saveToDatabase() for each of its fields.
   */
  abstract function saveToDatabase();
  
  /**
   *  Compare this definition to the one in the database - should first ensure existance
   *  It should also compare the fields - both those currently attached by calling Field->diffToDatabase() 
   *  and check that no additional fields have been added.
   */
  abstract function diffToDatabase();
  
  /**
   *  Checks whether this entity type/bundle exists already or not
   */
  abstract function exists();
  
  /**
   *  Remove this entity from the database and delete all field instances attached to it
   */
  abstract function deleteFromDatabase();
}