<?php 
require_once('utils.php');

/* Récupère les resultats d'un coureur
* @return : pdo statement, résultat de la requête sur la table
* @parmas : $id : int (id du coureur)
*/
function get_results($id){
  $link = connect();
  return $req1 = $link->query("SELECT c.nom, c.lieu, e.distance, DATE_FORMAT(e.date, '%d - %m - %Y') AS date, res.chrono, res.classement 
                        FROM resultats_courses AS res
                        JOIN edition AS e
                        ON res.idcourse = e.id
                        JOIN course AS c
                        ON e.id_course = c.id
                        WHERE res.idcoureur = $id
                        ORDER BY e.date DESC");
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

/* Récupère les information concernant une course
* @return : PDO statement
* @params : String (le nom de la course)
*/
function get_race($name){
  $link = connect();
  $res = $link->query('SELECT * FROM edition WHERE nom ="'. $name . '"');
  return $res;
}
/* Récupère la liste complète des courses et leur date
* @return : PDO statement (liste des noms des courses)
*/
function get_races_names_and_dates(){
  $link = connect();
  return $link->query('SELECT c.nom, e.id, YEAR(e.date) AS annee
                FROM course AS c
                JOIN edition AS e
                ON c.id = e.id_course
                ORDER BY c.nom, annee');
}


function get_races_select($id){
  $races = get_races_names_and_dates();
  $all_races = $races->fetchAll(PDO::FETCH_ASSOC);
  $races_select = array();
  foreach ($all_races as $race => $value) 
  {
    $races_select[$value["nom"]][] = array($value["annee"], $value['id']);
  }
//  var_dump($races_select);
  $results = get_results($id);
  $ran_races = $results->fetchAll(PDO::FETCH_COLUMN, "nom");
  $final_select = array();
  $final_select["ran_races"] = $ran_races;
  $final_select["all_races"] = $races_select;
  // foreach ($races_select as $race => $infos) 
  // {
  //   if(in_array($race, $ran_races))
  //   {
  //     $final_select[strtoupper($race)] = [$infos];
  //   }
  //   else
  //   {
  //     $final_select[$race] = [$infos];      
  //   }
  // }
   var_dump($final_select);
  return $final_select;   
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