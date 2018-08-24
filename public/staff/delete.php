<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/24/2018
   * Time: 10:13 AM
   */

  require_once('../../private/initialize.php');

  $id = $_GET['id'] ?? false;
  if (!$id) { redirect_to(url_for('/staff/index.php')); }

  $prop = Property::find_by_id($id);
  if ($prop == false) {
    redirect_to(url_for('/staff/index.php'));
  }

  if (is_post_request()) {
    $destination = PUBLIC_PATH . '/uploaded';

    // Delete Property
    $prop->delete();
    $prop->delete_images($destination);
    redirect_to(url_for('/staff/index.php'));

  } else {
    // Display form

  }

  $page_title = 'Edit Property';
  include(SHARED_PATH . '/staff_header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <a href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

      <h1>Delete Property</h1>
      <p>Are you sure you want to delete this property?</p>
      <p><?php echo h($prop->property_type); ?></p>

      <form action="<?php echo url_for('/staff/delete.php?id=' . h(u($id))); ?>" method="post">

        <div class="col-xs-12">
          <input type="submit" name="commit" value="Delete Property">
        </div>

      </form>

    </div>
  </div>
</div>

<!--Footer-->
<?php

  include(SHARED_PATH . '/staff_footer.php');

?>



