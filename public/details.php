<?php
  require_once('../private/initialize.php');

  $id = $_GET['id'] ?? false;
  if (!$id) {
    redirect_to('index.php');
  }

  $prop = Property::find_by_id($id);
  $images = $prop->get_images($prop->id);
  /*$img_main = $prop->main_image();*/

  $page_title = 'Details';
  include(SHARED_PATH . '/public_header.php');
?>

<div class="container">
  <div class="row">
    <section class="col-sm-8">
      <div class="thumbnail">



        <div class="carousel slide" id="featured">

          <lo class="carousel-indicators">

          <?php
            $active_li = false;
            for ($i = 0, $l = count($images); $i < $l; ++$i) {
              if (!$active_li) {
                $active_li = true;
          ?>

                <li data-target="#featured" data-slide-to="<?php echo $i; ?>" class="active"></li>

              <?php } else { ?>

                <li data-target="#featured" data-slide-to="<?php echo $i; ?>"></li>

              <?php } ?>
            <?php } ?>

          </lo>

          <div class="carousel-inner">



            <?php
              $active = false;
              foreach ($images as $img) {
                if (!$active) {
                  $active = true;
            ?>
                  <div class="item active">
                    <img class="img-responsive" src="<?php echo url_for('/uploaded/' . $img); ?>" alt="<?php echo $img; ?>">
                  </div>

              <?php } else { ?>

                  <div class="item">
                    <img class="img-responsive" src="<?php echo url_for('/uploaded/' . $img); ?>" alt="<?php echo $img; ?>">
                  </div>

              <?php } ?>
            <?php } ?>

           <!-- <div class="item">
              <img class="img-responsive" src="<?php /*echo url_for('/images/' . $img_main['image_path']); */?>" alt="House 1">
            </div>-->
          </div> <!--carousel-inner-->

          <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#featured" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>

        </div> <!--carousel-->



        <!--<img src="<?php /*echo url_for('/images/' . $img_main['image_path']); */?>" alt="House 1">-->
        <div class="caption">
          <h3><?php echo h($prop->property_type); ?></h3>
          <p><?php echo h($prop->description); ?></p>
          <section class="detail-section">
            <div class="sec-1">
              <p><strong>Developer: </strong><?php echo h($prop->development); ?></p>
              <p><strong>Condition: </strong><?php echo h($prop->condition()); ?></p>
              <p><strong>Bed Rooms: </strong><?php echo h($prop->bed_room); ?></p>
              <p><strong>Bath Rooms: </strong><?php echo h($prop->bath_room); ?></p>
              <p><strong>Air-Condition: </strong><?php echo h($prop->air_conditioning); ?></p>
              <p><strong>Floor: </strong><?php echo h($prop->floor); ?></p>
            </div>
            <div class="sec-2">
              <p><strong>Area: </strong><?php echo h($prop->area()); ?> square foot</p>
              <p><strong>Width: </strong><?php echo h($prop->width); ?></p>
              <p><strong>Height: </strong><?php echo h($prop->length); ?></p>
              <p><strong>City/State: </strong><?php echo h($prop->state); ?></p>
              <p><strong>Township: </strong><?php echo h($prop->township); ?></p>
              <p><strong>Address: </strong><?php echo h($prop->address); ?></p>
            </div>
          </section>
        </div>
      </div>






    </section>
  </div>
</div>

<!----Footer---->
<?php
  include(SHARED_PATH . '/public_footer.php');
?>
