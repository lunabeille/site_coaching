<?php

class Disconnect extends Controler
{
  public function execute($params = array())
  {
    require_once('utils.profile.php');
    $_SESSION = array();
    session_destroy();
    throw new RedirectException("Authentification", array());
  }
}