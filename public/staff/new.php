<?php
  require_once('../../private/initialize.php');

  if (is_post_request()) {

    $args = $_POST['property'];

    echo '<pre>';
    echo print_r($args);
    echo print_r($_FILES);
    echo '</pre>';

    $prop = new Property($args);
    $result = $prop->save();

    if ($result === true) {
      $new_id = $prop->id;
      /*$session->message('The proprety was created successfully.');*/
      /*redirect_to(url_for('/staff/show.php?id=' . $new_id));*/
    } else {
      // show errors
    }

  } else {
    // display the form
    $prop = new Property();

  }

  $page_title = 'Create Property';

  include(SHARED_PATH . '/staff_header.php');
?>

<div class="container">
  <div class="row">
    <section class="col-xs-4">
      <a href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>
      <?php echo display_errors($prop->errors); ?>


      <form action="<?php echo url_for('/staff/new.php'); ?>" method="post" enctype="multipart/form-data">

        <?php include('form_fields.php'); ?>




        <input class="btn btn-default pull-right" type="submit" value="Create Property" name="upload"/>
      </form>


    </section>
  </div><!-- row -->
</div><!-- content container -->
