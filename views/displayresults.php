<div class="content">
  <a id="addres" href="/sitecoaching/index.php/addResult">Ajouter un résultat</a>
  <p>MES RESULTATS </p>
  <table>
  <?php 
  // affiche les headers (A COMPLETER CAS PAS DE RES !!!!!)
  $line = $data[0];
  echo '<tr>';
  foreach($line as $champ => $valeur)
  {
    echo '<th>'.$champ.'</th>';
  }
  echo '</tr>';
  // affiche le contenu
  foreach ($data as $line)
  {
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