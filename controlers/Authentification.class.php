<?php

class Authentification extends Controler 
{
  public function execute ($params = array())
  {
    if(!empty($_SESSION))
    {
      throw new RedirectException("DisplayProfile", array());
    }
    require_once('utils.profile.php');
    if(!empty($_POST["username"]) && !empty($_POST["passwd"]))
    {
      $login = $_POST["username"];
      $passwd = $_POST["passwd"];
      $user_exists = check_user($login, $passwd);
      $user_id = get_user_id($login);

      if($user_exists)
        {
          $_SESSION["user_id"] = intval($user_id["id"]);
          throw new RedirectException("DisplayProfile", array());
        }
    }
    $data = array();
    return $data;
  }
}
