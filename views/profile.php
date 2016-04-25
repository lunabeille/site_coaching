<?php
include('header.php');
?>

<body>
 <?php 
  include('footer.php');
 ?>
<div class="content">
  <?php 
  echo('<p>Voici la page d\'acceuil de profil du coureur</p>');
  ?>
  
  <form method="POST" action="../controlers/update_profile.php">
  <fieldset>
     <legend>Informations générales</legend>
      <div> Prénom : <?php echo $nom; ?></div>
      <div> Age : <?php echo $age; ?></div>
      <div> Ville : <?php echo $ville; ?></div>
  </fieldset>

  <fieldset>
    <legend>Profil coureur</legend>
      <div> VMA: <?php echo $vma; ?></div>
      <div> Meilleure perf 10km : <?php echo $rp10 ?></div>
      <div> Meilleure perf Semi : <?php echo $rpsemi ?></div>
      <div> Meilleure perf marathon : </div>
  </fieldset>
  <?php 
 if($_SERVER['PHP_SELF'] == "/sitecoaching/controlers/update_profile.php"
          && $_POST['nom'] == NULL) 
  {
    echo '<input type="submit"/>';
  }
  ?>
  </form>
</div>
</body>
</html>
