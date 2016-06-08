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
      $updated = update_profile($_POST, 1);
     
      //if the update went well, display the profile with a message
      if($updated)
      {
        throw new RedirectException("DisplayProfile", array(
          'msg' => 'Changements bien pris en compte'));
      }
    }
    // if $_POST is empty, only display the form with default values
    $params = get_profile(1);
    $data = $params->fetch(PDO::FETCH_ASSOC); 
    //$this->setView("updateprofile"); 
    return $data;
  }
}

