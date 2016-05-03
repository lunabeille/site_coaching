<?php

class UpdateProfile extends Controler 
{
  public function execute($params = array())
  {
    require_once('utils.php');

    // 1.if $_POST has values (submit clicked)
    if(isset($_POST['nom']))
    {
      // send them to the database
      $updated = update_profile($_POST, 4);
     
      //if the update went well, display the profile with a message
      if($updated)
      {
        throw new RedirectException("DisplayProfile", array(
          'msg' => 'Changements bien pris en compte'));
      }
    }
    // if $_POST is empty, only display the form with default values
    $params = get_profile(4);
    $data = $params->fetch(PDO::FETCH_ASSOC); 
    $this->setView("updateprofile"); 
    return $data;
  }
}

