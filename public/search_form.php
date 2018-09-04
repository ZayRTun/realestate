<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 9/4/2018
   * Time: 9:10 AM
   */
?>

          <div class="col-md-2 col-sm-6">
            <div class="form-group">
              <label for="propertyType" class="sr-only">Property Type</label>
              <select name="property[property_type]" class="form-control" id="propertyType">
                <option value="" selected disabled>Select Property</option>
                <option value="any">All Property</option>
                <?php foreach (Property::PROPERTY_TYPE as $type) { ?>
                  <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                <?php } ?>
              </select>
            </div> <!--form-group-->
          </div> <!-- col-sm-2 -->

          <div class="col-md-2 col-sm-6">
            <div class="form-group">
              <label for="township" class="sr-only">Select Location</label>
              <select name="property[township]" class="form-control" id="township">
                <option value="any" selected disabled>Select Location</option>
                <option value="any">All Location</option>
                <?php foreach(Property::get_township_names() as $name) { ?>
                  <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                <?php } ?>
              </select>
            </div> <!-- form-group -->
          </div> <!-- col-sm-2 -->

          <div class="col-md-2 col-sm-6">
            <div class="form-group">
              <label for="propertyFor" class="sr-only">Property For</label>
                <select name="property[property_for]" class="form-control" id="propertyFor">
                  <?php foreach (Property::PROPERTY_FOR as $type) { ?>
                    <option value="<?php echo $type; ?>" <?php if ($type == 'Rent') { echo 'selected'; } ?>><?php echo $type; ?></option>
                  <?php } ?>
                </select>
            </div> <!-- form-group -->
          </div> <!--col-sm-2-->

          <div class="col-md-2 col-sm-6">
            <div class="form-group">
              <label for="minPrice" class="sr-only">Minimum Price</label>
                <input class="form-control" type="text" name="property[min_price]" id="minPrice" placeholder="Min Price">
            </div> <!--form-group-->
          </div> <!--col-sm-2-->

          <div class="col-md-2 col-sm-6">
            <div class="form-group">
              <label for="maxPrice" class="sr-only">Maximum Price</label>
                <input class="form-control" type="text" name="property[max_price]" id="maxPrice" placeholder="Max Price">
            </div> <!--form-group-->
          </div> <!--col-sm-2-->

