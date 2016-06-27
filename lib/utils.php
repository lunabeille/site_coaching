<?php
//pour se connecter à la bdd
function connect(){
  try
  {
    $link = new PDO('mysql:host=127.0.0.1;dbname=coaching;charset=utf8', 'root', 'poupinou');
  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getmessage());
  }
  return $link;
}

// function check_data($data){
  
//   if(ctype_digit($data))
//   {
//     $data = intval($data);
//   }
//   else
//   {
//     $data = mysql_real_escape_string($data);
//     $data = addcslashes($data, '%_');
//   }
//   return $data;
// }


