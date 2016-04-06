<?php
extract($data);
$data['nom'] = '<input type="text" name="nom" value="'.$nom.'"/>';
$data['vma'] = '<input type="number" step="0.1" min="6.0" max="30.0" value="'.$vma.'"/>';
$data['age'] = '<input type="number" step="1" min="10" max="100" value="'.$age.'"/>';
$data['ville'] = '<input type="text" name="ville" value="'.$ville.'"/>';
$data['rp10'] = '(format HH:MM:SS) <input type="text" name="rp10" value="'.$rp10.'"/>';
extract($data);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <title>Formulaire profile </title>
</head>

<body>
  <form method="post" action="../controlers/update_profile_c.php">
  <?php include('profile.php');
  ?>
  <input type="submit"/>
</body>
</html>