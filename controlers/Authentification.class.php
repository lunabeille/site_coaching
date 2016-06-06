<?php

class Authentification extends Controler 
{

  public function execute ($params = array())
  {
    require_once('utils.profile.php');
    if(!isset($_POST["login"]))
    {
      $data = array();
      return $data;
    }
    else
      {
        throw new RedirectException("DisplayProfile", array());
      }
  }
}
