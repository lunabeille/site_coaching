<?php

class DisplayProfile extends Controler 
{
  // collects the runner's infos to display into an array
  public function execute ($params = array())
  {
    require_once('utils.php');
    $params = get_profile(4);
    $profile = $params->fetch(PDO::FETCH_ASSOC);
    return $profile;
  }
}
