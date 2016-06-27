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
      while(($race = $res->fetch(PDO::FETCH_ASSOC)))
      {
        $races[$race["id_course"]][] = utf8_encode($race["nom"]);
      }

      return array('races' => $races);
    }
  }
}