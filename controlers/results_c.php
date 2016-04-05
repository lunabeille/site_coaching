<?php
include('../lib/utils.php');

function results_controler(){
  $results = get_results(4);
  return $results;
}