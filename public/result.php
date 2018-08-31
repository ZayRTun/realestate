<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/30/2018
   * Time: 1:27 PM
   */
  require_once('../private/initialize.php');

  $result = [];
  $sql = '';

  if (is_post_request()) {

    $args = $_POST['property'];

    if (!isset($args['property_type'])) {
      $args['property_type'] = 'any';
    }

    if (!isset($args['township'])) {
      $args['township'] = 'any';
    }


    $sql = "SELECT * FROM properties" . " ";

    if ($args['property_type'] != 'any') {

      $sql .= "WHERE property_type ='" . $args['property_type'] . "' ";

      if ($args['township'] != 'any') {
        $sql .= "AND township ='" . $args['township'] . "' ";
      }

      if ($args['property_for'] != 'For Rent or Sale') {

        $sql .= "AND property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale'  ";

      } else {

        $sql .= "AND property_for ='" . $args['property_for'] . "' ";

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

          $sql .= "AND property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale'  ";

        } else {

          $sql .= "AND property_for ='" . $args['property_for'] . "' ";

        }


        if (!empty($args['min_price']) && !empty($args['max_price'])) {

          $sql .= "AND price BETWEEN '" . $args['min_price'] . "' AND '" . $args['max_price'] . "' ";

        } elseif (!empty($args['min_price'])) {

          $sql .= "AND price >= '" . $args['min_price'] . "' ";

        } elseif (!empty($args['max_price'])) {

          $sql .= "AND price <= '" . $args['max_price'] . "' ";

        }

      } else {

        if ($args['property_for'] != 'For Rent or Sale') {

          $sql .= "WHERE property_for ='" . $args['property_for'] . "' OR property_for = 'For Rent or Sale' ";

        } else {

          $sql .= "WHERE property_for ='" . $args['property_for'] . "' ";

        }


        if (!empty($args['min_price']) && !empty($args['max_price'])) {

          $sql .= "AND price BETWEEN '" . $args['min_price'] . "' AND '" . $args['max_price'] . "' ";

        } elseif (!empty($args['min_price'])) {

          $sql .= "AND price >= '" . $args['min_price'] . "' ";

        } elseif (!empty($args['max_price'])) {

          $sql .= "AND price <= '" . $args['max_price'] . "' ";

        }

      }

    }




    $result = Property::find_by_sql($sql);

    echo '<pre>';
    echo print_r($sql);
    echo print_r($result);
    echo '</pre>';
    
    
  } else {
    redirect_to('index.php');
  }