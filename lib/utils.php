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

/* Récupère les infos du coureur pour la page d'accueil
* @return : PDO Statement 
* @params : int (id du coureur qui s'est authentifié
*/
function get_profile($id){
  $link = connect();
  return $link->query('SELECT * FROM coureur WHERE id ='. $id);
}

/* Récupère les information concernant une course
* @return : PDO statement
* @params : String (le nom de la course)
*/
function get_race($name){
  $link = connect();
  $res = $link->query('SELECT * FROM course WHERE nom ="'. $name . '"');
  return $res;
}
/* Récupère la liste complète des courses
* @return : PDO statement (liste des noms des courses)
*/
function get_races(){
  $link = connect();
  return = $link->query('SELECT nom FROM course');
}

/*récupère la liste des participants à une course donnée
* @return : PDO statement (liste coureurs + chronos)
* @params : String (le nom de la course sélectionnée)
*/
function get_participants($nom){
  $link = connect();
  $race_id = get_race_id($nom);
  return$link->query('SELECT c.nom, res.chrono, res.classement, res.commentaire 
                        FROM resultats_courses AS res, coureur AS c
                        WHERE res.idcoureur = c.id
                        AND res.idcourse ='.$race_id['id']);
}

/* Permet de récupérer l'id d'une course donnée
* (pour éviter des requêtes sql à rallonge)
* @return : int (id de la course)
* @params : String (nom de la course)
*/
function get_race_id($nom){
  $link = connect();
  $id = ($link->query('SELECT id FROM course WHERE nom ="'.$nom.'"'));
  return($id->fetch(PDO::FETCH_COLUMN));
}

/* Récupère les resultats d'un coureur
* @return : pdo statement, résultat de la requête sur la table
* @parmas : $id : int (id du coureur)
*/
function get_results($id){
  $link = connect();
  return $link->query("SELECT c.nom, c.distance, DATE_FORMAT(c.date, '%d - %m - %Y') AS date, res.chrono, res.classement 
                        FROM course AS c,resultats_courses AS res 
                        WHERE res.idcourse = c.id 
                        AND res.idcoureur = $id
                        ORDER BY c.date DESC");
}

/* met à jour les informations concernant un coureur
* @return true si udpate ok, false sinon
* @params: $values : array (nouvelles valeurs) ; $id : id du coureur
*/
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

/*
* Enregistre un nouveau résultat dans la table resultats_course
* @ return : true si enregistrement ok, false autrement
* @ params : $values : tableau contenant les données, $id coureur (int)
*/
function add_result($values, $id_coureur){
  // 1. récupération de l'ID de la course sélectionnée
  $id_course = get_race_id($values['race']);

  // 2. ajout du résultat dans la table 
  $link = connect();
  // 2.1 mise au format time du chrono
  extract($values);
  $chrono = "$heure:$min:$sec";
  print_r($chrono);
  try
  {
    $req = "INSERT INTO coaching.resultats_courses 
                      VALUES('$id_coureur', 
                              '$id_course',
                              '$chrono', 
                              '$classement',
                              '$commentaire'
                              )";
   $res = $link->exec($req);
   $ok = true;
  }
  catch(PDOException $e)
  {
    $ok = false;
  }
  return $ok;
}