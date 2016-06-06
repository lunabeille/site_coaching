<?php

class DisplayRace extends Controler 
{
  public function execute($params = array())
  {
    require_once('utils.results.php');
    //la page est requêtée depuis le lien sur la page displayResults
    //l'id de la course à afficher est dans l'url ($_GET['id'])
    if(isset($_GET['id']))
    {
      $res = array();
      // on récupère la liste des participants
      $participants = get_participants($_GET['id']);
      $data = $participants->fetchAll(PDO::FETCH_ASSOC); 
      $res['liste_participants'] = $data;

      // on récupère les infos sur la course
      $race = get_race($_GET['id']);
      $data2 = $race->fetchAll(PDO::FETCH_ASSOC);
      $data2["nom"] = $_GET["nom"];
      $res['infos_course'] = $data2;
      return $res;
    }
  }
}
