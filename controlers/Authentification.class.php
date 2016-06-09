<?php

class Authentification extends Controler 
{

  public function execute ($params = array())
  {
    require_once('utils.profile.php');
    if(!empty($_POST["username"]) && !empty($_POST["passwd"]))
    {
      $login = $_POST["username"];
      $passwd = $_POST["passwd"];
      $user_exists = check_user($login, $passwd);

      if($user_exists)
        {
          throw new RedirectException("DisplayProfile", array());
        }
    }
    $data = array();
    return $data;
  }

}
