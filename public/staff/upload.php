<?php
  require_once('../../private/initialize.php');

  $id = $_GET['id'] ?? false;
  if (!$id) {
    redirect_to('index.php');
  }


  $max = 500 * 1024;
  $img_result = [];
  if (isset($_POST['upload'])) {
  $prop = Property::find_by_id($id);
  $destination = PUBLIC_PATH . '/uploaded';
    try {
      $upload = new UploadFile($destination);
      $upload->setMaxSize($max);
      $upload->allowAllTypes();
      $upload->upload();
      $img_result = $upload->getMessages();
      $prop->image_names = $upload->getImageName();
      $result = $prop->save();
    } catch (Exception $e) {
      $img_result[] = $e->getMessage();
    }

    if ($result === true) {
      $new_id = $prop->id;
      redirect_to(url_for('/staff/show.php?id=' . $new_id));
    }
  }

  $page_title = 'Upload Form';

  include(SHARED_PATH . '/staff_header.php');

?>



<h1>Uploading Files</h1>
<?php if ($img_result) { ?>
  <ul class="result">
    <?php  foreach ($img_result as $message) {
      echo "<li>$message</li>";
    }?>
  </ul>
<?php } ?>
<form action="<?php echo url_for('staff/upload.php?id=' . $id); ?>" method="post" enctype="multipart/form-data">
  <p>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max;?>">
    <label for="filename">Select File:</label>
    <input type="file" name="filename[]" id="filename" multiple>
  </p>
  <p>
    <input type="submit" name="upload" value="Upload File">
  </p>
</form>
</body>
</html>