<?php
//pour se connecter à la bdd
function connect(){
  try
  {
    $link = new PDO('mysql:host=127.0.0.1;dbname=coaching;charset=utf8', 'root', 'poupinou');
  }
  catch(Exception $e)
  {
    die ('Erreur :'.$e->getmessage());
  }
  return $link;
}

//récupérer les infos du coureur pour la page d'accueil
function get_infos($id){
  //on se connecte
  $link = connect();
  //on récupère toutes les infos du coureur qui s'est authentifié
  $runner_infos = $link->query('SELECT * FROM coureur WHERE id ='.$id);
  return $runner_infos;
}

//récuperer les resultats d'un coureur
function get_results($id){
  //on se connecte
  $link = connect();
  //on récupere les resultats
  $results = $link->query('SELECT * FROM resultats_courses WHERE idcoureur='.$id);
  return $results;
}
?>
