<?php
include_once('../lib/utils.php');

//1.if $_POST is empty, only display the form with default values
if(!isset($_POST['nom']))
{
  $params = get_profile(4);
  $data = $params->fetch(PDO::FETCH_ASSOC);  
  require_once ('../views/update_profile.php');
}

//2.if $_POST has values, send them to the database
else
{
//    2.1 if the update went well, display the homepage
  $bool = update_profile($_POST, 4);
  var_dump($bool);
  if($bool)
  {
    echo'Changements bien pris en compte';
    require_once('display_profile.php');
  }
//    2.2 if the update went wrong, display the form again
  else
  {
    echo('Veuillez saisir correctement les informations');
  }
}

?>