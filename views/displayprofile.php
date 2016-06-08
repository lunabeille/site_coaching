<div class="content">
  <?php 
  echo('<h2 id="profile-name">' . $nom . '</h2>');
  ?>
  
  <form method="POST" action="/sitecoaching/index.php/updateProfile">
  <fieldset class="profile">
     <legend>Informations générales</legend>
      <div class="champ"><label for="age"> Age :</label> <?php echo $age; ?></div>
      <div class="champ"><label for="ville"> Ville :</label> <?php echo $ville; ?></div>
  </fieldset>

  <fieldset class="profile">
    <legend>Profil coureur</legend>
      <div class="champ"><label for="vma"> VMA:</label> <?php echo $vma; ?></div>
      <div class="champ"><label for="rp10"> Meilleure perf 10km :</label> <?php echo "$rp10h : $rp10min : $rp10sec" ?></div>
      <div class="champ"><label for="rpsemi"> Meilleure perf Semi :</label> <?php echo $rpsemi ?></div>
      <div class="champ"><label for="rpmarathon"> Meilleure perf marathon : </label></div>
  
  <?php 
 if($_SERVER['PHP_SELF'] == "/sitecoaching/index.php/updateProfile"
          && (empty($_POST))) 
  {
    echo '<input type="submit" class="submit" value="Envoyer"/>';
  }
  ?>
  </fieldset>
  </form>
</div>

