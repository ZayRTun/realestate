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
    protected static $db_columns = ['id', 'first_name', 'last_name', 'contact_phone', 'description', 'development', 'property_for', 'state', 'township', 'address', 'property_type', 'floor', 'width', 'length', 'bed_room', 'bath_room', 'air_conditioning', 'price', 'condition_id', 'image_names'];

    protected static $township_names = ['Ahlon', 'Bahan', 'Dagon', 'Kyauktada', 'Kyimyindaing', 'Lanmadaw', 'Latha', 'Pabedan', 'Sanchaung', 'Dagon Seikkan', 'East Dagon', 'North Dagon', 'North Okkalapa', 'South Dagon', 'South Okkalapa', 'Thingangyun', 'Dala', 'Dawbon', 'Botataung', 'Mingala Taungnyunt', 'Seikkyi Kanaungto', 'Tamwe', 'Pazundaung', 'Thaketa', 'Yankin', 'Insein', 'Hlaing', 'Hlaingthaya', 'Kamayut', 'Mayangon', 'Mingaladon', 'Shwepyitha'];

    public $id;
    public $first_name;
    public $last_name;
    public $contact_phone;
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
    public $img_main;
    public $image_names;
    protected $condition_id;

    public const PROPERTY_FOR = ['For Rent', 'For Sale', 'For Rent or Sale'];

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
      $this->first_name = $args['first_name'] ?? NULL;
      $this->last_name = $args['last_name'] ?? NULL;
      $this->contact_phone = $args['contact_phone'] ?? NULL;
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
      $this->image_names = $args['image_names'] ?? NULL;
    }

    public function get_name()
    {
      return "$this->first_name $this->last_name";
    }

    public static function get_township_names()
    {
      sort(self::$township_names);
      return self::$township_names;
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

    public function get_images()
    {
      return explode(', ', $this->image_names);
    }

    public function delete_images($path)
    {
      if ($path[strlen($path)-1 != '/']) {
        $path .= '/';
      }
      $img_array = explode(', ', $this->image_names);

      foreach ($img_array as $img) {
        if (file_exists($path . $img)) {
          unlink($path . $img);
        }
      }

    }
  }