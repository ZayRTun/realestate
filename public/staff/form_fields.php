<?php
  /**
   * Created by PhpStorm.
   * User: Zay
   * Date: 8/16/2018
   * Time: 11:02 PM
   */
  if (!isset($prop)) {
    echo 'Is not set';
//    redirect_to(url_for('/staff/index.php'));
  }
?>

<div class="col-sm-6">

  <div class="form-group">
    <label  for="firstName">First Name</label>
    <input type="text" name="property[first_name]"  id="firstName" class="form-control" value="<?php echo h($prop->first_name); ?>">
  </div>

  <div class="form-group">
    <label  for="lastName">Last Name</label>
    <input type="text" name="property[last_name]"  id="lastName" class="form-control" value="<?php echo h($prop->last_name); ?>">
  </div>

  <div class="custom-inline">
    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="propertyFor">Property For</label>
        <select name="property[property_for]" class="form-control" id="propertyFor">
          <?php foreach (Property::PROPERTY_FOR as $type) { ?>
            <option value="<?php echo $type; ?>" <?php if ($type == $prop->property_for) { echo 'selected'; } ?>><?php echo $type; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="contact">Phone</label>
        <input type="text" name="property[contact_phone]"  id="contact" class="form-control" value="<?php echo h($prop->contact_phone); ?>">
      </div>
    </div>
  </div>

  <div class="custom-inline">
    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="propertyType">Property Type</label>
        <select name="property[property_type]" class="form-control" id="propertyType">
          <?php foreach (Property::PROPERTY_TYPE as $type) { ?>
            <option value="<?php echo $type; ?>" <?php if ($type == $prop->property_type) { echo 'selected'; } ?>><?php echo $type; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="developer">Developer</label>
        <input type="text" name="property[development]"  id="developer" class="form-control" value="<?php echo h($prop->development); ?>">
      </div>
    </div>
  </div>







  <div class="custom-inline">
    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="bed_room">Bed Rooms</label>
        <input type="text" name="property[bed_room]"  id="bed_room" class="form-control" value="<?php echo h($prop->bed_room); ?>">
      </div>
    </div>

    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="bath_room">Bath Rooms</label>
        <input type="text" name="property[bath_room]"  id="bath_room" class="form-control" value="<?php echo h($prop->bath_room); ?>">
      </div>
    </div>
  </div>

  <div class="custom-inline">
    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="air_conditioning">Air Conditions</label>
        <input type="text" name="property[air_conditioning]"  id="air_conditioning" class="form-control" value="<?php echo h($prop->air_conditioning); ?>">
      </div>
    </div>

    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="condition">Property Condition</label>
        <select name="property[condition_id]" class="form-control" id="condition">
          <?php foreach(Property::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
            <option value="<?php echo $cond_id; ?>" <?php if ($prop->condition() == $cond_name) { echo 'selected'; } ?>><?php echo $cond_name; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </div>

  <div class="custom-inline">
    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="width">Width</label>
        <input type="text" name="property[width]"  id="width" class="form-control" value="<?php echo h($prop->width); ?>">
      </div>
    </div>

    <div class="col-xs-6 inline">
      <div class="form-group">
        <label  for="length">Length</label>
        <input type="text" name="property[length]"  id="length" class="form-control" value="<?php echo h($prop->length); ?>">
      </div>
    </div>
  </div>








</div> <!--col-sm-6-->

<div class="col-sm-6">





  <!--<div class="clearfix"></div>-->

  <div class="form-group">
    <label  for="floor">Floor</label>
    <input type="text" name="property[floor]"  id="floor" class="form-control" value="<?php echo h($prop->floor); ?>">
  </div>

  <div class="form-group">
    <label  for="address">Address</label>
    <input type="text" name="property[address]"  id="address" class="form-control" value="<?php echo h($prop->address); ?>">
  </div>

  <div class="form-group">
    <label  for="township">Township</label>
    <select name="property[township]" class="form-control" id="township">
      <?php foreach(Property::get_township_names() as $name) { ?>
        <option value="<?php echo $name; ?>" <?php if ($name == 'Bahan') { echo 'selected'; } ?>><?php echo $name; ?></option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label  for="state">State</label>
    <input type="text" name="property[state]"  id="state" class="form-control" value="<?php echo h($prop->state); ?>">
  </div>

  <div class="form-group">
    <label  for="price">Price</label>
    <input type="text" name="property[price]"  id="price" class="form-control" value="<?php echo h($prop->price); ?>">
  </div>

  <div class="form-group">
    <label  for="description">Description</label>
    <textarea name="property[description]" class="form-control" id="description" rows="5" cols="50"><?php echo h($prop->description); ?></textarea>
  </div>




</div> <!--col-sm-6-->




