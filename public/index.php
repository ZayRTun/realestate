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
        $img_arr = $prop->get_images($prop->id);
    ?>
      <section class="col-xs-6 col-sm-4">
        <div class="thumbnail">
          <?php foreach ($img_arr as $images)  {?>
            <?php foreach ($images as $img) {?>
          <img src="<?php echo url_for('/images/' . $img) ?>" alt="House 1">
            <?php } ?>
          <?php } ?>
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

