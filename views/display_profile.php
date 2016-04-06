<?php
$data = homepage_controler();
extract($data);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title>Mon profil</title>
</head>

<body>  
  <?php include('profile.php');
  ?>
</body>
</html>
