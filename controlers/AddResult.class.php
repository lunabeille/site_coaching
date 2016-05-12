<?php

class AddResult extends Controler
{
  public function execute($params = array())
  {
    require_once('utils.php');
    // Si le $_Post est vide : affiche le formulaire 
    if(!isset($_POST['chrono']))
    {
      //récupération liste des courses pour le select du form.
      $list_races = get_races();
      $data = $list_races->fetchAll(PDO::FETCH_COLUMN, "nom");
      return $data;

    }
    // Si le $-POST contient des valeurs : ajout résultat 
    // dans la bdd et display results avec message "OK"
  }

}