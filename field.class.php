<?php

abstract class Field implements DrupalCommunicable {
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
}
