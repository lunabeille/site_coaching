<?php

class DisplayResults extends Controler 
{
  // collects the runner's results to display into an array
  public function execute ($params = array())
  {
    require_once('utils.php');
    $results = get_results(4);
    $data = $results->fetchAll(PDO::FETCH_ASSOC); 
    return $data;
  }
}