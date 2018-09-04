<?php

  require_once('../private/initialize.php');

  $page_title = 'Search Property';

  include(SHARED_PATH . '/public_header.php');

  $result = [];

  if (is_post_request()) {

    $args = $_POST['property'];

    if (!isset($args['property_type'])) {
      $args['property_type'] = 'any';
    }

    if (!isset($args['township'])) {
      $args['township'] = 'any';
    }


    $result = Property::search_property($args);

    if ($result) {

      /*echo '<pre>';
      echo print_r($result);
      echo '</pre>';*/

    } else {

      echo 'Sorry the property your searching for is not available currently';

    }

  } else {

    redirect_to('index.php');

  }

?>
  <!--Body-->
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
                <!--<input type="submit" class="btn btn-primary btn-block" value="Search" name="search">-->
                <button type="submit" class="btn btn-primary btn-block" value="Search" name="search"><span class="glyphicon glyphicon-search"></span> Search</button>
              </div>
            </div>

          </form>
        </section>
      </div><!-- row -->
    </div><!-- form container -->
  </div> <!--container-fluid-->


  <!--Result-->
  <div class="container ">
    <h3>Search Result</h3>
    <div class="row">
      <?php foreach ($result as $prop) {?>
        <?php $img_main = $prop->get_images($prop->id); ?>
        <div class="col-xs-12 result">
          <div class="col-sm-4">
            <div class="thumbnail" style="background-image: url(<?php echo url_for('/uploaded/' . $img_main[0]); ?>)">
              <img class="index_img" src="<?php echo url_for('/uploaded/' . $img_main[0]) ?>" alt="House 1">
            </div>
          </div> <!--/col-sm-4-->
          <div class="col-sm-8">
            <div class="caption">
              <h3><?php echo h($prop->property_type); ?></h3>
              <p><?php echo h($prop->property_for); ?></p>
              <p><?php echo h($prop->township); ?></p>
              <p>Price : <?php echo h($prop->price); ?></p>
              <p class="description"><?php echo h($prop->description); ?></p>
              <a href="details.php?id=<?php echo $prop->id; ?>" class="btn btn-info">View Details</a>
            </div>
          </div> <!--/col-sm-8-->
        </div> <!--/col-sm-12-->
      <?php } ?>
    </div> <!--/row-->
  </div> <!--/container-->


















  <!--Footer-->
<?php

  include(SHARED_PATH . '/public_footer.php');

?>