<?php
  require_once('../private/initialize.php');

  $page_title = 'Home';

  include(SHARED_PATH . '/public_header.php');

  $lastPosts = Property::get_latest_posting();

?>

<!--search form-->
<div class="container-fluid content-container">
  <div class="container">
    <div class="row">
      <section class="col-xs-12">
        <h3>Property Search</h3>
        <form class="search_form" action="<?php echo url_for('result.php'); ?>" method="post">

          <div class="col-sm-2">
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

          <div class="col-sm-2">
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

          <div class="col-sm-2">
            <div class="form-group">
              <label for="propertyFor" class="sr-only">Property For</label>
                <select name="property[property_for]" class="form-control" id="propertyFor">
                  <?php foreach (Property::PROPERTY_FOR as $type) { ?>
                    <option value="<?php echo $type; ?>" <?php if ($type == 'Rent') { echo 'selected'; } ?>><?php echo $type; ?></option>
                  <?php } ?>
                </select>
            </div> <!-- form-group -->
          </div> <!--col-sm-2-->

          <div class="col-sm-2">
            <div class="form-group">
              <label for="minPrice" class="sr-only">Minimum Price</label>
                <input class="form-control" type="text" name="property[min_price]" id="minPrice" placeholder="Min Price">
            </div> <!--form-group-->
          </div> <!--col-sm-2-->

          <div class="col-sm-2">
            <div class="form-group">
              <label for="maxPrice" class="sr-only">Maximum Price</label>
                <input class="form-control" type="text" name="property[max_price]" id="maxPrice" placeholder="Max Price">
            </div> <!--form-group-->
          </div> <!--col-sm-2-->

          <div class="col-sm-2">
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Search" name="search">
            </div>
          </div>

        </form>

      </section>
    </div><!-- row -->
  </div><!-- form container -->
</div> <!--container-fluid-->

<!--carousel-->
<div class="container carousel-container">

  <div class="row">
    <section class="col-xs-12">

      <h3>Latest Postings</h3>

      <div class="carousel slide main_slide" data-ride="carousel" id="featured">
        <div class="carousel-inner">
          <?php $active = false; ?>
          <?php foreach ($lastPosts as $lastPost) { ?>
              <?php $images = $lastPost->get_images($lastPost->id); ?>
              <?php if (!$active) { ?>
              <?php $active = true; ?>


                  <div class="item active" >
                    <a href="details.php?id=<?php echo $lastPost->id; ?>">

                      <div class="row">
                        <div class="col-sm-8">
                          <div class="thumbnail" style="background-image: url(<?php echo url_for('/uploaded/' . $images[0]); ?>)">
                            <img class="img-responsive center-block" src="<?php echo url_for('/uploaded/' . $images[0]); ?>" alt="<?php echo $images[0]; ?>">
                          </div>
                        </div>
                        <div class="caption col-sm-4 hidden-xs">
                          <h3><?php echo $lastPost->property_type; ?></h3>
                          <p>For <?php echo $lastPost->property_for; ?></p>
                          <p><?php echo $lastPost->description; ?></p>
                          <p><?php echo $lastPost->township; ?></p>
                          <p><?php echo $lastPost->price; ?></p>
                        </div>
                      </div>

                    </a>
                  </div>

              <?php } else { ?>

              <div class="item" >
                <a href="details.php?id=<?php echo $lastPost->id; ?>">

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="thumbnail" style="background-image: url(<?php echo url_for('/uploaded/' . $images[0]); ?>)">
                        <img class="img-responsive center-block" src="<?php echo url_for('/uploaded/' . $images[0]); ?>" alt="<?php echo $images[0]; ?>">
                      </div>
                    </div>
                    <div class="caption col-sm-4 hidden-xs">
                      <h3><?php echo $lastPost->property_type; ?></h3>
                      <p>For <?php echo $lastPost->property_for; ?></p>
                      <p><?php echo $lastPost->description; ?></p>
                      <p><?php echo $lastPost->township; ?></p>
                      <p><?php echo $lastPost->price; ?></p>
                    </div>
                  </div>

                </a>
              </div>

              <?php } ?> <!-- end of if else -->

          <?php } ?>
        </div> <!--carousel-inner-->

        <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#featured" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

      </div> <!--Carousel-->
    </section>
  </div> <!--end of row-->
</div> <!-- container -->

<!--tab-content-->
<div class="container-fluid content-container">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h3>Listings</h3>

        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a role="tab" data-toggle="tab" href="#rent">For Rent</a>
          </li>
          <li role="presentation">
            <a role="tab" data-toggle="tab" href="#sale">For Sale</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" role="tabpanel" id="rent">
            <div class="row">
              <?php
                $props = Property::find_all_for_rent();
                foreach ($props as $prop) {
                  $img_main = $prop->get_images($prop->id);
              ?>
                  <section class="col-xs-12 col-sm-6 col-md-4">
                    <div class="thumbnail">
                      <img class="index_img" src="<?php echo url_for('/uploaded/' . $img_main[0]) ?>" alt="House 1">
                      <div class="caption">
                        <h3><?php echo h($prop->property_type); ?></h3>
                        <p><?php echo h($prop->property_for); ?></p>
                        <p class="description"><?php echo h($prop->description); ?></p>
                        <a href="details.php?id=<?php echo $prop->id; ?>" class="btn btn-info">View Details</a>
                      </div>
                    </div>
                  </section>
              <?php } ?>
            </div>


          </div> <!-- tab-pane -->
          <div class="tab-pane" role="tabpanel" id="sale">

            <div class="row">

              <?php
                $props = Property::find_all_for_sale();
                foreach ($props as $prop) {
                  $img_main = $prop->get_images($prop->id);

                  /*$img_main = $prop->main_image();*/
                  ?>
                  <section class="col-xs-12 col-sm-6 col-md-4">


                    <div class="thumbnail">
                      <img class="index_img" src="<?php echo url_for('/uploaded/' . $img_main[0]) ?>" alt="House 1">
                      <div class="caption">
                        <h3><?php echo h($prop->property_type); ?></h3>
                        <p><?php echo h($prop->property_for); ?></p>
                        <p class="description"><?php echo h($prop->description); ?></p>
                        <a href="details.php?id=<?php echo $prop->id; ?>" class="btn btn-info">View Details</a>
                      </div>
                    </div>
                  </section>
                <?php } ?>

            </div>
          </div> <!-- tab-pane -->
        </div> <!-- tab-content -->
      </div> <!-- col-xs-12 -->
    </div> <!--end of row-->
  </div> <!--container-->
</div> <!--container-fluid-->


<?php

  include(SHARED_PATH . '/public_footer.php');

?>

