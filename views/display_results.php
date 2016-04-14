<?php
$results = results_controler();
include('header.php');
?>

<body>
  <?php 
  $first = true;
  echo('<p>Voici la page de resultats du coureur </p>');
  echo '<table border="solid">';
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
      if ($champ == 'nom')
      {
        echo '<td><a href="../controlers/display_race.php?nom='.$valeur.'">'.$valeur.'</a></td>';        
      }
      else 
      {
        echo '<td>'.$valeur.'</td>';
      }
    }
    echo '</tr>';
  }
  echo '</table/>';  
  include('footer.php');
  ?>
