<?php
  require_once('../../private/initialize.php');

  $id = $_GET['id'] ?? false;
  if (!$id) {
    redirect_to('index.php');
  }

  $prop = Property::find_by_id($id);

  $page_title = 'Details';
  include(SHARED_PATH . '/public_header.php');
?>

<div class="container">
  <div class="row">
    <section class="col-sm-8">
      <div class="thumbnail">




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
              <p><strong>Street: </strong><?php echo h($prop->address); ?></p>
            </div>
          </section>
        </div>
      </div>






    </section>
  </div>
</div>

<!----Footer---->
