<?php
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
  $first = true;
  echo('<p>Voici la page de resultats du coureur </p>');
  echo '<table border = 1>';
  while ($data = $results->fetch(PDO::FETCH_ASSOC))
  {
    if($first)
    {
      echo '<tr>';
      foreach($data as $champ => $valeur)
      {
        echo '<th>'.$champ.'</th>';
      }
      echo '</tr>';
      $first = false;
    }

    echo '<tr>';
    foreach($data as $champ => $valeur)
    {
      echo '<td>'.$valeur.'</td>';
    }
    echo '</tr>';
  }
  echo '</table/>';  
  ?>
</body>
</html>