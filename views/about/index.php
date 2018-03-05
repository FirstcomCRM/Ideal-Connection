<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEA HYDRAULIC ENGINEERING | <?=$this->title;?></title>
    <?php 
      include_once 'header.php';
    ?>
  </head>
  <body class="hold-transition" id = "page-about">
      <div class="container container-common">
        <?=html_entity_decode($this->content);?>
      </div>
  </body>

<?php 
include_once 'js.php';
include_once 'footer.php';
?>