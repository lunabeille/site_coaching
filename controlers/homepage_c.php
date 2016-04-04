<?php
include('../lib/utils.php');

function homepage_controler(){
  $params = get_infos(4);
  return $params;
}
?>