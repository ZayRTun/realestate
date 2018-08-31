<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/31/2018
   * Time: 10:45 AM
   */

  require_once('../private/initialize.php');

  $a = 'any';
  $b = '';
  $c = '';

  echo "A is" . empty($a) . "<br>";
  echo "B is" . empty($b) . "<br>";
  echo 'C is' . isset($c) . '<br>';

  $props = Property::find_all();

  foreach ($props as $prop) {
    $img = $prop->get_images($prop->id);
    echo print_r($img) . '<br>';
  }
