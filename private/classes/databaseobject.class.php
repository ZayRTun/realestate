<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/10/2018
   * Time: 4:44 PM
   */
  class DatabaseObject
  {
    static protected $database;
    static protected $table_name = "";
    static protected $columns = [];
    public $errors = [];

    public static function set_database($database)
    {
      self::$database = $database;
    }

    public static function find_by_sql($sql)
    {
      $result = self::$database->query($sql);
      if (!$result) {
        exit('Database query failed.');
      }

      // Results into object
      $object_array = [];
      while ($record = $result->fetch_assoc())
      {
        $object_array[] = static::instantiate($record);
      }

      $result->free();

      return $object_array;
    }

    public static function find_all()
    {
      $sql = "SELECT * FROM " . static::$table_name;
      return static::find_by_sql($sql);
    }

    public static function find_all_for_rent()
    {
      $rent = 'For Rent';
      $rentOrsale = 'For Rent or Sale';

      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE property_for ='" . $rent . "' OR property_for ='" . $rentOrsale . "'";

      return static::find_by_sql($sql);
    }

    public static function find_all_for_sale()
    {
      $sale = 'For Sale';
      $rentOrsale = 'For Rent or Sale';

      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE property_for ='" . $sale . "' OR property_for ='" . $rentOrsale . "'";

      return static::find_by_sql($sql);
    }

    public static function search_property($args)
    {

      $sql = "SELECT * FROM " . static::$table_name . " ";

      if ($args['property_type'] != 'any') {

        $sql .= "WHERE property_type ='" . $args['property_type'] . "' ";

        if ($args['township'] != 'any') {
          $sql .= "AND township ='" . $args['township'] . "' ";
        }

        if ($args['property_for'] != 'For Rent or Sale') {

          $sql .= "AND (property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale')  ";

        } else {

          $sql .= "AND (property_for ='" . $args['property_for'] . "' ";

        }


        if (!empty($args['min_price']) && !empty($args['max_price'])) {

          $sql .= "AND price BETWEEN '" . $args['min_price'] . "' AND '" . $args['max_price'] . "' ";

        } elseif (!empty($args['min_price'])) {

          $sql .= "AND price >= '" . $args['min_price'] . "' ";

        } elseif (!empty($args['max_price'])) {

          $sql .= "AND price <= '" . $args['max_price'] . "' ";

        }

      } else {

        if ($args['township'] != 'any') {

          $sql .= "WHERE township ='" . $args['township'] . "' ";

          if ($args['property_for'] != 'For Rent or Sale') {

            $sql .= "AND (property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale')  ";

          } else {

            $sql .= "AND (property_for ='" . $args['property_for'] . "' ";

          }


          if (!empty($args['min_price']) && !empty($args['max_price'])) {

            $sql .= "AND price BETWEEN '" . $args['min_price'] . "' AND '" . $args['max_price'] . "')";

          } elseif (!empty($args['min_price'])) {

            $sql .= "AND price >= '" . $args['min_price'] . "'";

          } elseif (!empty($args['max_price'])) {

            $sql .= "AND price <= '" . $args['max_price'] . "'";

          }

        } else {

          if ($args['property_for'] != 'For Rent or Sale') {

            $sql .= "WHERE (property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale') ";

          } else {

            $sql .= "WHERE property_for ='" . $args['property_for'] . "'";

          }


          if (!empty($args['min_price']) && !empty($args['max_price'])) {

            $sql .= "AND (price BETWEEN '" . $args['min_price'] . "' AND '" . $args['max_price'] . "') ";

          } elseif (!empty($args['min_price'])) {

            $sql .= "AND price >= '" . $args['min_price'] . "' ";

          } elseif (!empty($args['max_price'])) {

            $sql .= "AND price <= '" . $args['max_price'] . "' ";

          }

        }

      }
      $sql .= 'ORDER BY price ASC';

      return static::find_by_sql($sql);

    }

    public static function get_latest_posting()
    {
      $sql = "SELECT * FROM ( SELECT * FROM " . static::$table_name . " ";
      $sql .= "ORDER BY id DESC LIMIT 2 ) sub ORDER BY id ASC";
      return static::find_by_sql($sql);
    }

    public static function count_all()
    {
      $sql = "SELECT COUNT(*) FROM " . static::$table_name;
      $result_set = self::$database->query($sql);
      $row = $result_set->fetch_array();
      return array_shift($row);
    }

    public static function find_by_id($id)
    {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
      $obj_array = static::find_by_sql($sql);
      if (!empty($obj_array)) {
        return array_shift($obj_array);
      } else {
        return false;
      }
    }

    protected static function instantiate($record)
    {
      $object = new static();

      // Could manually assign values to properties
      // but automatic assignment is easier and re-usable
      foreach ($record as $property => $value)
      {
        if (property_exists($object, $property)) {
          $object->$property = $value;
        }
      }
      return $object;
    }

    protected function validate()
    {
      $this->errors = [];

      // Add custom validations

      return $this->errors;
    }

    protected function create()
    {
      $this->validate();
      if (!empty($this->errors)) { return false; }

      $attributes = $this->sanitized_attributes();
      // language=<mySQL>
      $sql = "INSERT INTO " . static::$table_name . " (";
      $sql .= join(', ', array_keys($attributes));
      $sql .= ") VALUES ('";
      $sql .= join("', '", array_values($attributes));
      $sql .= "')";
      $result = self::$database->query($sql);
      if ($result) {
        $this->id = self::$database->insert_id;
      }
      return $result;
    }

    protected function update()
    {
      $this->validate();
      if (!empty($this->errors)) { return false; }

      $attributes = $this->sanitized_attributes();
      $attribute_pairs = [];
      foreach ($attributes as $key => $value)
      {
        $attribute_pairs[] = "{$key}='{$value}'";
      }
      $sql = "UPDATE " . static::$table_name . " SET ";
      $sql .= join(', ', $attribute_pairs);
      $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;
    }

    public function save()
    {
      // A new record will not have an ID yet
      if (isset($this->id)) {
        return $this->update();
      } else {
        return $this->create();
      }
    }

    public function merge_attributes($args=[])
    {
      foreach ($args as $key => $value)
      {
        if (property_exists($this, $key) && !is_null($value))
        {
          $this->$key = $value;
        }
      }
    }

    // Properties which have database columns, excluding ID
    public function attributes()
    {
      $attributes = [];
      foreach (static::$db_columns as $column)
      {
        if ($column == 'id') { continue; }
        $attributes[$column] = $this->$column;
      }
      return $attributes;
    }

    protected function sanitized_attributes()
    {
      $sanitized = [];
      foreach ($this->attributes() as $key => $value)
      {
        $sanitized[$key] = self::$database->escape_string($value);
      }
      return $sanitized;
    }

    public function delete()
    {
      $sql = "DELETE FROM " . static::$table_name . " ";
      $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
      $sql .= "LIMIT 1";
      $result = self::$database->query($sql);
      return $result;

      // After deleting, the instance of the object will still
      // exist, even though the database record does not.
      // This can be useful, as in:
      //  echo $user->first_name . " was deleted.";
      // but, for example, we can't call $user->update() after
      // calling $user->delete().
    }

  }