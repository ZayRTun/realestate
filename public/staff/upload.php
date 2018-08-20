<?php
  require_once('../../private/initialize.php');

  $max = 300 * 1024;
  $result = array();
  if (isset($_POST['upload'])) {
    $destination = PUBLIC_PATH . '/uploaded';
    try {
      $upload = new UploadFile($destination);
      $upload->setMaxSize($max);
      $upload->allowAllTypes();
      $upload->upload();
      $result = $upload->getMessages();
      echo $upload->getImageName();
    } catch (Exception $e) {
      $result[] = $e->getMessage();
    }
  }

  $page_title = 'Upload Form';

  include(SHARED_PATH . '/staff_header.php');

?>



<h1>Uploading Files</h1>
<?php if ($result) { ?>
  <ul class="result">
    <?php  foreach ($result as $message) {
      echo "<li>$message</li>";
    }?>
  </ul>
<?php } ?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
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