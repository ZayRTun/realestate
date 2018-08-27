<?php
  require_once('../private/initialize.php');
  $page_title = 'Home';
  include(SHARED_PATH . '/public_header.php');
?>

  <!--Getting Latest postings-->

<?php

  $lastPosts = Property::get_latest_posting();


?>



  <div class="container">
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

                  <div class="item active main_slide_item">
                    <a href="details.php?id=<?php echo $lastPost->id; ?>">

                    <img class="img-responsive center-block" src="<?php echo url_for('/uploaded/' . $images[0]); ?>" alt="<?php echo $images[0]; ?>">

                    </a>
                  </div>

                <?php } else { ?>

                <div class="item main_slide_item">
                  <a href="details.php?id=<?php echo $lastPost->id; ?>">

                    <img class="img-responsive center-block" src="<?php echo url_for('/uploaded/' . $images[0]); ?>" alt="<?php echo $images[0]; ?>">

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

    <?php
      $props = Property::find_all();
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
            <p><?php echo h($prop->description); ?></p>
            <a href="details.php?id=<?php echo $prop->id; ?>" class="btn btn-info">View Details</a>
          </div>
        </div>
      </section>
    <?php } ?>

    </div>
  </div>

<?php

  include(SHARED_PATH . '/public_footer.php');

?>

