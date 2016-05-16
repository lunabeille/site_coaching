<?php

class DisplayProfile extends Controler 
{
  // collects the runner's infos to display into an array
  public function execute ($params = array())
  {
    require_once('utils.profile.php');
    $params = get_profile(1);
    $profile = $params->fetch(PDO::FETCH_ASSOC);
    return $profile;
  }
}
