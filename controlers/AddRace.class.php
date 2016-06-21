<?php
class AddRace extends Controler 
{
/**
 *Permet d'enregistrer une nouvelle course dans la bdd
 * 
 *
 *
 */
  public function execute ($params = array())
  {
    require_once('utils.resutlts.php');

    if(isset($_GET['year']))
    {
      if($_GET['year'] == "2015")
      {
        $year = "2016";
      }
      else
      {
        $year = "2015";
      }
      $res = get_races_names_and_id($year);

      while($race = $res->fetch(PDO::FETCH_ASSOC))
      {
        
      }
    }