<?php
include('../lib/utils.php');

//récupère les infos du coureur à afficher dans le profil
function homepage_controler(){
  $params = get_profile(4);
  $data = $params->fetch(PDO::FETCH_ASSOC);
  return $data;
}