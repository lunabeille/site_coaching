<?php
//inclusion controleur
require_once('../controlers/homepage_c.php');
$data = homepage_controler_affiche();
extract($data);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title>Mon profil</title>
</head>

<body>
  pouet
  <?php include('profile.php');
  ?>
</body>
</html>
