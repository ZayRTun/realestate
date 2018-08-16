<?php
  require_once('../private/initialize.php');
  $page_title = 'Home';
  include(SHARED_PATH . '/public_header.php');
?>


  <div class="container">
    <div class="row">

    <?php
      $props = Property::find_all();
      foreach ($props as $prop) {
        $prop->get_images($prop->id);
        $img_main = $prop->main_image();
    ?>
      <section class="col-xs-12 col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="index_img" src="<?php echo url_for('/images/' . $img_main['image_path']) ?>" alt="House 1">
          <div class="caption">
            <h3><?php echo h($prop->property_type); ?></h3>
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

