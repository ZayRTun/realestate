<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo url_for('/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo url_for('/css/styles.css'); ?>">
  <title>Goldan Land <?php if (isset($page_title)) { echo '- ' . h($page_title);} ?></title>
</head>
<body>
<header id="staff_header">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">Goldan Land Real Estate</a>
      </div>
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">For Sale</a></li>
          <li><a href="#">For Rent</a></li>
          <li><a href="#">New Properties</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>