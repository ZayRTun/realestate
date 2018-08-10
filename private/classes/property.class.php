<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/10/2018
   * Time: 5:15 PM
   */
  class Property extends DatabaseObject
  {
    protected static $table_name = 'properties';
    protected static $db_columns = ['id', 'description', 'development', 'state', 'township', 'street', 'property_type', 'floor', 'width', 'length', 'bed_room', 'bath_room', 'air_conditioning', 'price', 'features', 'condition_id', 'img_name'];

    public $id;
    public $description;
    public $development;
    public $state;
    public $township;
    public $street;
    public $property_type;
    public $floor;
    public $width;
    public $length;
    public $bed_room;



  }