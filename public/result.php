<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/30/2018
   * Time: 1:27 PM
   */
  require_once('../private/initialize.php');

  $result = [];

  if (is_post_request()) {

    $args = $_POST['property'];

    if (!isset($args['property_type'])) {
      $args['property_type'] = 'any';
    }

    if (!isset($args['township'])) {
      $args['township'] = 'any';
    }


    $result = Property::search_property($args);

    if ($result) {
      echo '<pre>';
      echo print_r($result);
      echo '</pre>';
    } else {
      echo 'Sorry the property your serching for is not available currently';
    }


    
  } else {
    redirect_to('index.php');
  }