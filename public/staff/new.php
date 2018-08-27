<?php
  require_once('../../private/initialize.php');

  if (is_post_request()) {

    $args = $_POST['property'];

    $prop = new Property($args);
    $result = $prop->save();

    if ($result === true) {
      $new_id = $prop->id;
      /*$session->message('The proprety was created successfully.');*/
      redirect_to(url_for('/staff/upload.php?id=' . $new_id));
    } else {
      // show errors
      echo '<pre>';
      echo print_r($args);
      echo '</pre>';
    }

  } else {
    // display the form
    $prop = new Property();

  }

  $page_title = 'Create Property';

  include(SHARED_PATH . '/staff_header.php');
?>

<div class="container main">
  <div class="row">
    <section class="col-xs-12">
      <a href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>
      <?php echo display_errors($prop->errors); ?>


      <form action="<?php echo url_for('/staff/new.php'); ?>" method="post" enctype="multipart/form-data">

        <?php include('form_fields.php'); ?>


        <div class="col-xs-12">
          <input class="btn btn-primary btn-block" type="submit" value="Create Property" name="upload"/>
        </div>

      </form>


    </section>
  </div><!-- row -->
</div><!-- content container -->

<?php

  include(SHARED_PATH . '/staff_footer.php');

?>
