<div class="content">
  <?php 
  echo('<p>Mon profil</p>');
  ?>
  
  <form method="POST" action="/sitecoaching/index.php/updateProfile">
  <fieldset>
     <legend>Informations générales</legend>
      <div class="champ"> Prénom : <?php echo $nom; ?></div>
      <div class="champ"> Age : <?php echo $age; ?></div>
      <div class="champ"> Ville : <?php echo $ville; ?></div>
  </fieldset>

  <fieldset>
    <legend>Profil coureur</legend>
      <div class="champ"> VMA: <?php echo $vma; ?></div>
      <div class="champ"> Meilleure perf 10km : <?php echo $rp10 ?></div>
      <div class="champ"> Meilleure perf Semi : <?php echo $rpsemi ?></div>
      <div class="champ"> Meilleure perf marathon : </div>
  </fieldset>
  <?php 
 if($_SERVER['PHP_SELF'] == "/sitecoaching/index.php/updateProfile"
          && $_POST['nom'] == NULL) 
  {
    echo '<input type="submit"/>';
  }
  ?>
  </form>
</div>

