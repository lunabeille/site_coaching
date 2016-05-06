<?php
include_once('../lib/utils.php');
    
// 2.if $_POST has values, send them to the database
if(isset($_POST['nom']))
{
  // 2.1 if the update went well, display the homepage
  $updated = update_profile($_POST, 4);
  if($updated)
  {
    $msg = 'Changements bien pris en compte';
    require_once('display_profile.php');
    exit(0);
  }

  // 2.2 if the update went wrong, display the form again
  $error = 'Veuillez saisir correctement les informations';  
}

// 1.if $_POST is empty, only display the form with default values
$params = get_profile(4);
$data = $params->fetch(PDO::FETCH_ASSOC);  
require_once ('../views/update_profile.php');
