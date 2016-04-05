<?php
require_once('../controlers/results_c.php');
$results = results_controler();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title> resultats coureur</title>
</head>

<body>
  <?php 
  echo('<p>Voici la page de resultats du coureur </p>');
  while ($data = $results->fetch(PDO::FETCH_ASSOC))
  {
    extract($data);
    print_r($data);
    echo('</br>');
  }
  ?>
</body>
</html>