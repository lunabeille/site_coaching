<?php

class AddResult extends Controler
{
  public function execute($params = array())
  {
    require_once('utils.results.php');
    // Si le $-POST contient des valeurs : ajout résultat 
    // dans la bdd et display results avec message "OK"    
    if(isset($_POST['min']))
    {      
      $updated = add_result($_POST, $_SESSION["user_id"]);
      // ajout ok :   
      if($updated)
      {
        throw new RedirectException("DisplayResults", array(
          'msg' => 'Nouvelle perf bien ajoutée !'));
      }
    }
   

    // récupération liste des courses pour le select du form.
    // en fonction de l'année sélectionnée ($_GET["annee"])  
    $list_races = get_races_select($_SESSION["user_id"], $_GET["annee"]);
    return $list_races;
  }

}