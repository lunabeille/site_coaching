<?php

class UpdateProfile extends Controler 
{
  public function execute($params = array())
  {
    require_once('utils.profile.php');

    // 1.if $_POST has values (submit clicked)
    if(!empty($_POST))
    {
      // send them to the database
      $updated = update_profile($_POST, $_SESSION["user_id"]);
     
      //if the update went well, display the profile with a message
      if($updated)
      {
        throw new RedirectException("DisplayProfile", array(
          'msg' => 'Changements bien pris en compte'));
      }
    }
    // if $_POST is empty, only display the form with default values
    $params = get_profile($_SESSION["user_id"]);
    $data = $params->fetch(PDO::FETCH_ASSOC); 
    return $data;
  }
}

