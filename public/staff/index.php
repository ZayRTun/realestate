<?php
  require_once('../../private/initialize.php');
  $page_title = 'Home';
  include(SHARED_PATH . '/staff_header.php');
  $props = Property::find_all();
?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <a href="<?php echo url_for('/staff/new.php'); ?>">Add new</a>
        
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Property Type</th>
                <th>Property For</th>
                <th>Developer</th>
                <th>Floor</th>
                <th>Area</th>
                <th>Condition</th>
                <th>Address</th>
                <th>Township</th>
                <th>State</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($props as $prop) { ?>
              <tr>
                <td><?php echo h($prop->property_type); ?></td>
                <td><?php echo h($prop->property_for); ?></td>
                <td><?php echo h($prop->development); ?></td>
                <td><?php echo h($prop->floor); ?></td>
                <td><?php echo h($prop->area()) . ' sqft'; ?></td>
                <td><?php echo h($prop->condition()); ?></td>
                <td><?php echo h($prop->address); ?></td>
                <td><?php echo h($prop->township); ?></td>
                <td><?php echo h($prop->state); ?></td>
                <td><?php echo h($prop->price) . ' kyats'; ?></td>
                <td><a href="<?php echo url_for('/staff/show.php?id=' . h(u($prop->id))); ?>">Details</a></td>
                <td><a href="<?php echo url_for('/staff/edit?id=' . h(u($prop->id))); ?>">Edit</a></td>
                <td><a href="<?php echo url_for('/staff/delete?id=' . h(u($prop->id))); ?>">Delete</a></td>
              </tr>
            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>






















<?php include(SHARED_PATH . '/staff_footer.php'); ?>























