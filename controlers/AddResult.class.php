<?php

class AddResult extends Controler
{
  public function execute($params = array())
  {
    require_once('utils.php');
    // Si le $-POST contient des valeurs : ajout résultat 
    // dans la bdd et display results avec message "OK"    
    if(isset($_POST['min']))
    {      
      $updated = add_result($_POST, 1);
      // ajout ok : 
      if($updated)
      {
        throw new RedirectException("DisplayResults", array(
          'msg' => 'Nouvelle perf bien ajoutée !'));
      }
    }
    // récupération liste des courses pour le select du form.
    $list_races = get_races();
    $data = $list_races->fetchAll(PDO::FETCH_COLUMN, "nom");
    return $data;
  }

}