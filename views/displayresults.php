<div class="content">
  <?php 
  $first = true;
  echo('<p>Voici la page de resultats du coureur </p>');
  echo '<table>';
  foreach ($data as $line)
  {
    if($first)
    {
      echo '<tr>';
      foreach($line as $champ => $valeur)
      {
        echo '<th>'.$champ.'</th>';
      }
      echo '</tr>';
      $first = false;
    }

    echo '<tr>';
    foreach($line as $champ => $valeur)
    {
      if ($champ == 'nom')
      {
        echo '<td><a href="/sitecoaching/index.php/displayRace?nom='.$valeur.'">'.$valeur.'</a></td>';        
      }
      else 
      {
        echo '<td>'.$valeur.'</td>';
      }
    }
    echo '</tr>';
  }
  echo '</table/>';
  ?>
</div>