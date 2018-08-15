<?php
  require_once('../../private/initialize.php');
  $page_title = 'Home';
  include(SHARED_PATH . '/staff_header.php');
  $props = Property::find_all();
?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-hover">
            <thead>
              <tr>
                <th>Proper Type</th>
                <th>Developer</th>
                <th>Floor</th>
                <th>Area</th>
                <th>Condition</th>
                <th>Street</th>
                <th>Township</th>
                <th>State</th>
                <th>Price</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($props as $prop) { ?>
              <tr>
                <td><?php echo h($prop->property_type); ?></td>
                <td><?php echo h($prop->development); ?></td>
                <td><?php echo h($prop->floor); ?></td>
                <td><?php echo h($prop->area()) . ' sqft'; ?></td>
                <td><?php echo h($prop->condition()); ?></td>
                <td><?php echo h($prop->street); ?></td>
                <td><?php echo h($prop->township); ?></td>
                <td><?php echo h($prop->state); ?></td>
                <td><?php echo h($prop->price) . ' kyats'; ?></td>
                <td><a href="<?php echo url_for('/staff/property/details?id=' . h(u($prop->id))); ?>">Details</a></td>
              </tr>
            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>






















<?php include(SHARED_PATH . '/staff_footer.php'); ?>























