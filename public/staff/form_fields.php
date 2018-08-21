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

<div class="form-group">
  <label  for="propertyType">Property Type</label>
  <input type="text" name="property[property_type]" id="propertyType" class="form-control" value="<?php echo $prop->property_type; ?>">
</div>

<div class="form-group">
  <label  for="developer">Developer</label>
  <input type="text" name="property[development]"  id="developer" class="form-control" value="<?php echo h($prop->development); ?>">
</div>

<div class="form-group">
  <label  for="bed_room">Bed Rooms</label>
  <input type="text" name="property[bed_room]"  id="bed_room" class="form-control" value="<?php echo h($prop->bed_room); ?>">
</div>

<div class="form-group">
  <label  for="bath_room">Bath Rooms</label>
  <input type="text" name="property[bath_room]"  id="bath_room" class="form-control" value="<?php echo h($prop->bath_room); ?>">
</div>

<div class="form-group">
  <label  for="air_conditioning">Air Conditions</label>
  <input type="text" name="property[air_conditioning]"  id="air_conditioning" class="form-control" value="<?php echo h($prop->air_conditioning); ?>">
</div>

<div class="form-group">
  <label  for="condition">Condition</label>
  <select name="property[condition_id]" class="form-control" id="condition">
    <option value=""></option>
    <?php foreach(Property::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
      <option value="<?php echo $cond_id; ?>" <?php if ($prop->condition() == $cond_name) { echo 'selected'; } ?>><?php echo $cond_name; ?></option>
    <?php } ?>
  </select>
</div>

<div class="form-group">
  <label  for="width">Width</label>
  <input type="text" name="property[width]"  id="width" class="form-control" value="<?php echo h($prop->width); ?>">
</div>

<div class="form-group">
  <label  for="length">Length</label>
  <input type="text" name="property[length]"  id="length" class="form-control" value="<?php echo h($prop->length); ?>">
</div>

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
  <input type="text" name="property[township]"  id="township" class="form-control" value="<?php echo h($prop->township); ?>">
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
  <label  for="features">Features</label>
  <textarea name="property[features]" class="form-control" id="features" rows="5" cols="50"><?php echo h($prop->features); ?></textarea>
</div>

<div class="form-group">
  <label  for="description">Description</label>
  <textarea name="property[description]" class="form-control" id="description" rows="5" cols="50"><?php echo h($prop->description); ?></textarea>
</div>
