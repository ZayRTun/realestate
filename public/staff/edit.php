<?php
  /**
   * Created by PhpStorm.
   * User: zayt
   * Date: 8/23/2018
   * Time: 11:35 AM
   */

  require_once('../../private/initialize.php');

  $id = $_GET['id'] ?? false;
  if (!$id) { redirect_to(url_for('/staff/index.php')); }

  $prop = Property::find_by_id($id);

  if ($prop == false) {
    redirect_to(url_for('/staff/index.php'));
  }

  if (is_post_request()) {

    $args = $_POST['property'];
    $prop->merge_attributes($args);
    $result = $prop->save();

    if ($result === true) {
      redirect_to(url_for('/staff/show.php?id=' . $id));
    } else {
      // show errors
    }

  } else {

    // display the form

  }

  $page_title = 'Edit Property';
  include(SHARED_PATH . '/staff_header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <a href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

      <div class="row">
        <div class="col-xs-12">
          <h1>Edit Property</h1>

          <form action="<?php echo url_for('/staff/edit.php?id=' . h(u($id))); ?>" method="post">

            <?php include ('form_fields.php'); ?>


            <div class="col-xs-12">
              <input class="btn btn-primary btn-block" type="submit" value="Edit Property" name="Edit"/>
            </div>


          </form>

        </div>
      </div>




    </div>
  </div>
</div>

<?php

  include(SHARED_PATH . '/staff_footer.php');

?>
