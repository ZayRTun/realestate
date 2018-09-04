<?php
  require_once('../private/initialize.php');

  $page_title = 'Home';

  include(SHARED_PATH . '/public_header.php');

  $lastPosts = Property::get_latest_posting();

  // Paginations

  /*$current_page = $_GET['page'] ?? 1;
  $per_page = 8;
  $total_count = Property::count_all();

  $pagination = new Pagination($current_page, $per_page, $total_count);

  $sql = "SELECT * FROM properties";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $props = Property::find_by_sql($sql);*/

?>

<!--search form-->
<div class="container-fluid content-container">
  <div class="container">
    <div class="row">
      <section class="col-xs-12">
        <!--<h3>Property Search</h3>-->
        <form class="search_form" action="<?php echo url_for('result.php'); ?>" method="post">

          <?php include('search_form.php'); ?>

          <div class="col-md-2  col-sm-6">
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" value="Search" name="search"><span class="glyphicon glyphicon-search"></span> Search</button>
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

      <h3 class="carousel-header">Latest Postings</h3>

      <div class="carousel slide main_slide" id="featured">
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
                        <div class="col-sm-4 hidden-xs">
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
                  <section class="col-xs-12 col-sm-4 col-md-3">
                    <a href="details.php?id=<?php echo $prop->id; ?>">
                      <div class="thumb">
                        <div class="img" style="background-image: url(<?php echo url_for('/uploaded/' . $img_main[0]) ?>)">
                        </div>
                        <div class="thumb-cont">
                          <h3><?php echo h($prop->property_type); ?></h3>
                          <p><?php echo h($prop->property_for); ?></p>
                          <p><?php echo h($prop->township); ?></p>
                          <p>Price : <?php echo h($prop->price); ?></p>
                        </div>
                      </div>
                    </a>
                  </section>
              <?php } ?>
              <div class="col-xs-12">
                <a class="btn btn-success" href="#">View All Properties For Rent</a>
                <hr>
              </div>

            </div>


          </div> <!-- tab-pane -->
          <div class="tab-pane" role="tabpanel" id="sale">

            <div class="row">

              <?php
                $props = Property::find_all_for_sale();
                foreach ($props as $prop) {
                  $img_main = $prop->get_images($prop->id);
                  ?>
                  <section class="col-xs-12 col-sm-4 col-md-3">
                    <a href="details.php?id=<?php echo $prop->id; ?>">
                      <div class="thumb">
                        <div class="img" style="background-image: url(<?php echo url_for('/uploaded/' . $img_main[0]) ?>)">
                        </div>
                        <div class="thumb-cont">
                          <h3><?php echo h($prop->property_type); ?></h3>
                          <p><?php echo h($prop->property_for); ?></p>
                          <p><?php echo h($prop->township); ?></p>
                          <p>Price : <?php echo h($prop->price); ?></p>
                        </div>
                      </div>
                    </a>
                  </section>
                <?php } ?>
              <div class="col-xs-12">
                <a class="btn btn-success" href="#">View All Properties For Sale</a>
                <hr>
              </div>

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

