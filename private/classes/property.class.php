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
    protected static $db_columns = ['id', 'description', 'development', 'property_for', 'state', 'township', 'address', 'property_type', 'floor', 'width', 'length', 'bed_room', 'bath_room', 'air_conditioning', 'price', 'features', 'condition_id', 'image_names'];

    public $id;
    public $property_type;
    public $property_for;
    public $development;
    public $description;
    public $state;
    public $township;
    public $address;
    public $floor;
    public $width = 0.0;
    public $length = 0.0;
    public $bed_room;
    public $bath_room;
    public $air_conditioning;
    public $price = 0.0;
    public $features;
    public $img_main;
    public $image_names;
    protected $condition_id;

    public const PROPERTY_FOR = ['Rent', 'Sale', 'Rent or Sale'];

    public const PROPERTY_TYPE = ['Condominium', 'Mini-Condominium', 'Apartment', 'Flat', 'Bungalow', 'Land'];

    public const CONDITION_OPTIONS = [
      1 => 'Average',
      2 => 'Decent',
      3 => 'Good',
      4 => 'Great',
      5 => 'Like New'
    ];

    public function __construct($args=[])
    {
      $this->property_type = $args['property_type'] ?? NULL;
      $this->property_for = $args['property_for'] ?? NULL;
      $this->development = $args['development'] ?? NULL;
      $this->bed_room = $args['bed_room'] ?? NULL;
      $this->bath_room = $args['bath_room'] ?? NULL;
      $this->air_conditioning = $args['air_conditioning'] ?? NULL;
      $this->condition_id = $args['condition_id'] ?? 3;
      $this->description = $args['description'] ?? NULL;
      $this->width = $args['width'] ?? 0.0;
      $this->length = $args['length'] ?? 0.0;
      $this->floor = $args['floor'] ?? NULL;
      $this->address = $args['address'] ?? NULL;
      $this->township = $args['township'] ?? NULL;
      $this->state = $args['state'] ?? NULL;
      $this->price = $args['price'] ?? 0.0;
      $this->features = $args['features'] ?? NULL;
      $this->image_names = $args['image_names'] ?? NULL;
    }

    public function area()
    {
      $square_feet = floatval($this->width) * floatval($this->length);
      return $square_feet;
    }

    public function condition()
    {
      if ($this->condition_id > 0) {
        return self::CONDITION_OPTIONS[$this->condition_id];
      } else {
        return 'Unknown';
      }
    }

    protected function validate()
    {
      $this->errors = [];
      if (is_blank($this->description)) {
        $this->errors[] = 'Description cannot be blank.';
      }
      if (is_blank($this->development)) {
        $this->errors[] = 'Development cannot be blank.';
      }
      return $this->errors;
    }
  }