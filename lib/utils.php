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

//récupérer les infos du coureur pour la page d'accueil
function get_profile($id){
  $link = connect();
  //on récupère toutes les infos du coureur qui s'est authentifié
  return $link->query('SELECT * FROM coureur WHERE id ='. $id);
}

function get_race($name){
  $link = connect();
  $res = $link->query('SELECT * FROM course WHERE nom ="'. $name . '"');
  return $res;
}

function get_races(){
  $link = connect();
  $res = $link->query('SELECT nom FROM course');
  return $res;
}

//récupère la liste des participants et leurs chronos
function get_participants($nom){
  $link = connect();
  $race_id = get_race_id($nom);
  return$link->query('SELECT c.nom, res.chrono, res.classement, res.commentaire 
                        FROM resultats_courses AS res, coureur AS c
                        WHERE res.idcoureur = c.id
                        AND res.idcourse ='.$race_id['id']);
}

function get_race_id($nom){
  $link = connect();
  $id = ($link->query('SELECT id FROM course WHERE nom ="'.$nom.'"'));
  return($id->fetch());
}

//récuperer les resultats d'un coureur (infos utiles seulement)
function get_results($id){
  $link = connect();
  //on récupere les resultats SELECT pseudo, message, DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss') AS date FROM minichat
  return $link->query("SELECT c.nom, c.distance, DATE_FORMAT(c.date, '%d - %m - %Y') AS date, res.chrono, res.classement 
                        FROM course AS c,resultats_courses AS res 
                        WHERE res.idcourse = c.id 
                        AND res.idcoureur = $id
                        ORDER BY c.date DESC");
}

//mettre à jour la table coureur
function update_profile($values, $id){
  $link = connect();
  extract($values);

  try {
    $req = "UPDATE coaching.coureur SET nom = '$nom', 
                            age = '$age', 
                            ville = '$ville',
                            vma = '$vma',
                            rp10 = '$rp10'
                          WHERE coureur.id = $id";
  $res = $link->exec($req);
  $ok = true;
  }
  catch (PDOException $e)
  {
    $ok = false;
  }

  return $ok;
}
