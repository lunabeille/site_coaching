 <?php 

    $participants = $data['liste_participants'];
    $race = $data['infos_course'];
    extract($race[0]);
  ?>

 <div class="content">
  <div>
    <h3>Informations sur la course</h3>
    <form method="POST" action="/sitecoaching/index.php">
        <fieldset>
          <legend><?php echo $race['nom'] ?></legend>
            <div class="champ"> Distance : <?php echo $distance; ?> Km </div>
            <div class="champ"> Date : <?php echo $date; ?></div>
            <div class="champ"> Ville : <?php echo $lieu; ?></div>
          </fieldset>
   </div>

   <div>
      <h3> Ma course en quelques mots</h3>
    <?php echo $commentaire; ?>
   </div>

  <div>
    <h3>Ils ont participé à cette course !</h3>
    <p>
      <?php 
      $first = true;
      echo '<table>';
      foreach ($participants as $line) 
      {
        if($first)
        {
          echo '<tr>';
          foreach($line as $key =>$value)
          {
            echo '<th>'.$key.'</th>';
          }
          echo '</tr>';
          $first = false;
        }
        echo'<tr>';

        foreach($line as $key => $value)
        {
          echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>';
      ?>
    </p>
  </div>
</div>