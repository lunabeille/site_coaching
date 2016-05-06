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
      //$res[0] = ($participants->fetchAll());
      return $participants;

      // on récupère les infos sur la course
      $race = get_race($_GET['nom']);
      //$res[1] = ($race->fetchAll());
      //return $res;
      // return 
    }
  }
}
