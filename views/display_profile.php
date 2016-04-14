<?php
$data = homepage_controler();
extract($data);
include('header.php');
?>

<body>  
  <?php 
  include('profile.php');
  include('footer.php');
  ?>

