<?php

class DisplayRace extends Controler 
{
  // collects the runner's results to display into an array
  public function execute ($params = array())
  {
    require_once('utils.php');
    //la page est requêtée depuis le lien sur la page d_results
    //le nom de la course à afficher est dans l'url ($_GET['nom'])
    if(isset($_GET['nom']))
    {
      $res = array();
      // on récupère la liste des participants
      $participants = get_participants($_GET['nom']);
      $data = $participants->fetchAll(PDO::FETCH_ASSOC); 
      $res['liste_participants'] = $data;

      // on récupère les infos sur la course
      $race = get_race($_GET['nom']);
      $data2 = $race->fetchAll(PDO::FETCH_ASSOC);
      $res['infos_course'] = $data2;
      return $res;
    }
  }
}
