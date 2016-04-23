<?php
$data = homepage_controler();
extract($data);
print_r($_SERVER['QUERY_STRING']);
include('profile.php');
?>

