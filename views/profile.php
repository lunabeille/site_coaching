<php
include('header.php');
?>

<body>
  <?php 
  echo('<p>Voici la page d\'acceuil de profil du coureur</p>');
  ?>
  
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
 
