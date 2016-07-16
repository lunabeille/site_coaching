<?php
class AddRace extends Controler 
{
/**
 *Permet d'enregistrer une nouvelle course dans la bdd
 * 
 *
 *
 */
  public function execute($params = array())
  {
    require_once('utils.results.php');

    // on select les courses qui n'ont pas d'édition l'année choisie
    if(isset($_POST['year']))
    {
      $races = array();
      
      if($_POST['year'] == "2015")
      {
        $year = "2016";
      }
      else
      {
        $year = "2015";
      }
      
      $res = get_races_names_and_id($year);

      // la liste des course à afficher dans le select
      while(($race = $res->fetch(PDO::FETCH_ASSOC)))
      {
        $races[$race["id_course"]][] = utf8_encode($race["nom"]);
      }

      return array('data' => $races);
    }

    if(isset($_POST['race']))
    {
        $res = get_lieu($_POST['race']);
        $lieu = $res->fetch(PDO::FETCH_ASSOC);
        return array('data' => $lieu);

    }

    if(isset($_POST['valider']))
    {
      $updated = add_race($_POST);

      if($updated)
      {
        throw new RedirectException("DisplayResult", array(
          'msg' => 'Changements bien pris en compte'));
      }

    }

  }
}