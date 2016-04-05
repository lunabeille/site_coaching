<?php
include('../lib/utils.php');

//récupère les infos du coureur à afficher dans le profil
function get_profile(){
  $params = get_infos(4);
  $data = $params->fetch(PDO::FETCH_ASSOC);
  return $data;
}
//mettre à jour les données du profil
function update_profile(){
  $data = get_profile();
  extract($data);
  $data['nom'] = '<input type="text" name="nom" value="'.$nom.'"/>';
  $data['vma'] = '<input type="number" step="0.1" min="6.0" max="30.0" value="'.$vma.'"/>';
  $data['age'] = '<input type="number" step="1" min="10" max="100" value="'.$age.'"/>';
  $data['ville'] = '<input type="text" name="ville" value="'.$ville.'"/>';
  $data['rp10'] = '(format HH:MM:SS) <input type="text" name="rp10" value="'.$rp10.'"/>';

  return $data;
}
?>