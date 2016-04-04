<?php
include('../lib/utils.php');

//récupère les infos du coureur à afficher dans le profil
function homepage_controler(){
  $params = get_infos(4);
  return $params;
}

//mettre à jour les données du profil
//function update_profile(){
//}
?>