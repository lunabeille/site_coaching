<?php
include('../lib/utils.php');

//récupère les infos du coureur à afficher dans le profil
function get_profile(){
  $params = get_infos(4);
  $data = $params->fetch(PDO::FETCH_ASSOC);
  return $data;
}