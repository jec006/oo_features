<?php

abstract class Field {
  //The name of the field, required
  public $name;
  
  //The entity to which this field is attached
  public $entity;
  
  /**
   *  The constructor
   *  $name - The name of the field we're creating
   *  $entity - the entity to which this field instance will be attached
   */
  public function __constructor($name, Entity $entity){
    $this->name = $name;
    $this->entity = $entity;
  }
  
  /**
   *  This function should save the field instance attached to the entity to the database
   */
  abstract function saveToDatabase();

  /**
   *  Compare this definition to the one in the database - should first ensure existance
   */
  abstract function diffToDatabase();

  /**
   *  Checks whether this field instance exists already or not
   */
  abstract function exists();

  /**
   *  Remove this field instance from the database
   */
  abstract function deleteFromDatabase();
}