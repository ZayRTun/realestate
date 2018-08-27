<?php
  require_once('../../private/initialize.php');
  $page_title = 'Home';
  include(SHARED_PATH . '/staff_header.php');
  $props = Property::find_all();
?>

  <div class="container main">
    <div class="row">
      <div class="col-sm-12">

        <a href="<?php echo url_for('/staff/new.php'); ?>">Add new</a>
        
        <div class="table-responsive table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Property Type</th>
                <th>Property For</th>
                <th>Area</th>
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
                <td><?php echo h($prop->get_name()); ?></td>
                <td><?php echo h($prop->contact_phone); ?></td>
                <td><?php echo h($prop->property_type); ?></td>
                <td><?php echo h($prop->property_for); ?></td>
                <td><?php echo h($prop->area()) . ' sqft'; ?></td>
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























