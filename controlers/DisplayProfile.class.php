<?php
class DisplayProfile extends Controler 
{
  // collects the runner's infos to display into an array
  public function execute ($params = array())
  {
    require_once('utils.profile.php');
    $params = get_profile($_SESSION["user_id"]);
    $profile = $params->fetch(PDO::FETCH_ASSOC);
    return $profile;
  }
}
