<?php
//inclusion controleur
require_once('../controlers/homepage_c.php');
$params = homepage_controler();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title>Exercice formulaire php</title>
</head>

<body>
  <?php 
  echo('<p>Voici la page d\'acceuil de profil du coureur</p>');
  $data = $params->fetch(PDO::FETCH_ASSOC);
  //print_r($data);
  extract($data);
  ?>

  <form>
    <fieldset>
      <legend>Informations générales</legend>
        <div> Prénom : <?php echo $nom; ?></div>
        <div> Age : </div>
        <div> Ville : </div>
    </fieldset>
  </form>

  <form>
    <fieldset>
      <legend>Profil coureur</legend>
        <div> VMA: <?php echo $vma; ?></div>
        <div> Meilleure perf 10km : <?php echo $rp10 ?></div>
        <div> Meilleure perf Semi : <?php echo $rpsemi ?></div>
        <div> Meilleure perf marathon : </div>
    </fieldset>
  </form>
  <p> <a href="results.php">Lien vers les résultats </a></p>
  <p> <a href="profile_form.php"> Modifier mon profil </a></p>
  <p> <a href="news.php">Lien vers les News </a></p>
  <p> <a href="calendar.php">Lien vers le calendrier des courses </a></p>


</body>
</html>
