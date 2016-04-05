<?php
//inclusion controleur
require_once('../controlers/homepage_c.php');
$data = update_profile();
extract($data);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title>Formulaire profile </title>
</head>

<body>
  <?php include('./profile.php');
  ?>
  <input type="submit"/>
</body>
</html>