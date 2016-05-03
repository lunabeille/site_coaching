<div class="content">
  <?php 
  $first = true;
  echo('<p>Voici la page de resultats du coureur </p>');
  echo '<table>';
  while ($result = $data->fetch(PDO::FETCH_ASSOC))
  {
    if($first)
    {
      echo '<tr>';
      foreach($result as $champ => $valeur)
      {
        echo '<th>'.$champ.'</th>';
      }
      echo '</tr>';
      $first = false;
    }

    echo '<tr>';
    foreach($result as $champ => $valeur)
    {
      if ($champ == 'nom')
      {
        echo '<td><a href="../controlers/DisplayRace.class.php?nom='.$valeur.'">'.$valeur.'</a></td>';        
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