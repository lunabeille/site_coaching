<?php
include('../lib/utils.php');

//1.if $_POST is empty, only display the form with default values
//if(!isset($_POST[])){

$params = get_profile(4);
$data = $params->fetch(PDO::FETCH_ASSOC);  
require_once ('../views/update_profile.php');
//}

//2.if $_POST has values, send them to the database
//    2.1 if the update went well, display the homepage
//    2.2 if the update went wrong, display the form again

//function update_infos(){
  //$values = 
//}
?>