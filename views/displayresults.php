<div class="content">
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
  <p> ------------------------------------------------------------------- </p>
  <div> 
    <p>AJOUTER UN RESULTAT</p>
    <a class="addres" href="/sitecoaching/index.php/addResult?annee=2016">2016</a>
    <a class="addres" href="/sitecoaching/index.php/addResult?annee=2015">2015</a>
  </div>
</div>