<?php
class AddRace extends Controler 
{
  /*
  Permet d'enregistrer une nouvelle course dans la bdd



  */
  public function execute ($params = array())
  {
    require_once('utils.resutlts.php');
    $params = 