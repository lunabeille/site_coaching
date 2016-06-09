<?php

class DisplayResults extends Controler 
{
  // collects the runner's results to display into an array
  public function execute ($params = array())
  {
    require_once('utils.results.php');
    $results = get_results($_SESSION["user_id"]);
    $data = $results->fetchAll(PDO::FETCH_ASSOC); 
    return $data;
  }
}