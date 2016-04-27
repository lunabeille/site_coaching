<?php
include_once('../lib/utils.php');

//la page est requêtée depuis le lien sur la page d_results
//le nom de la course à afficher est dans l'url ($_GET['nom'])
if(isset($_GET['nom']))
{
  //on récupère la liste des participants à la course en question
  //$list_.. est un objet - Attention
  $participants = get_participant_to_one_race($_GET['nom']);

  //on récupère les infos sur la course
  $race = get_race($_GET['nom']);
  var_dump($race);
  include('../views/display_race.php');
}
