<?php
include('../lib/utils.php');

function results_controler(){
  $results = get_results(4);
  return $results;
}

require_once('../views/results.php');
?>