<?php
include('../lib/utils.php');

//récupère les infos du coureur à afficher dans le profil
function homepage_controler_affiche(){
  $params = get_infos(4);
  $data = $params->fetch(PDO::FETCH_ASSOC);
  return $data;
}
//mettre à jour les données du profil
function update_profile(){
  $data = homepage_controler_affiche();
  extract($data);
  $name = '<input type="text" name="nom" value="'.$nom.'"/>';
  $year = '<input type="number" step="1" min="10" max="100" value="'.$age.'"/>';
  $city = '<input type="text" name="ville" value="'.$ville.'"/>';
  $vit='<input type="number" step="0.1" min="6.0" max="30.0" value="'.$vma.'"/>';
  $best10 = "(format HH:MM:SS) <input type=\"text\" name=\"rp10\"/>";
  $data['nom'] = $name;
  $data['vma'] = $vit;
  $data['age'] = $year;
  $data['ville'] = $city;
  $data['rp10'] = $best10;

  return $data;
}
?>