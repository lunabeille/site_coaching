<?php
include('../lib/utils.php');

//récupère les résultats du coureur
function results_controler(){
  $results = get_results(4);
  return $results;
}

//affiche les résultats du coureur
require_once('../views/display_results.php');
?>