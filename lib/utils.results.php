<?php 
require_once('utils.php');

/* Récupère les resultats d'un coureur
* @return : pdo statement, résultat de la requête sur la table
* @parmas : $id : int (id du coureur)
*/
function get_results($id){
  $link = connect();
  return $req1 = $link->query("SELECT c.nom, c.lieu,e.id, e.distance, DATE_FORMAT(e.date, '%d - %m - %Y') AS date, res.chrono, res.classement 
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
  // 1. récupération de l'ID de l'édition de la course
  var_dump($values);
  $id_course = $values["race"];

  // 2. ajout du résultat dans la table 
  $link = connect();
  // 2.1 mise au format time du chrono
  extract($values);
  $chrono = "$heure:$min:$sec";
  try
  {
    $req = "INSERT INTO coaching.resultats_courses 
                      VALUES('$id_coureur', 
                              CAST('$id_course' AS UNSIGNED),
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
function get_race($id){
  $link = connect();
  return $link->query('SELECT e.distance, e.denivele, e.date, e.commentaire, e.nb_participants, c.lieu 
                      FROM edition AS e
                      JOIN course AS c
                      ON e.id_course = c.id
                      WHERE e.id ="'. $id . '"');
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

/* Récupère la liste des courses correspondant à une 
* année donnée
* @ params : String (l'année de la course)
* @ return : PDO stmt (nom course + id_édition)
*/ 

function get_races_names_and_id($year){
  $link = connect();
  return $link->query("SELECT c.nom, e.id
                FROM course AS c
                JOIN edition AS e
                ON c.id = e.id_course
                WHERE YEAR(e.date)='$year'
                ORDER BY c.nom");
}


/* Récupère les informations pour afficher la liste des courses 
* dans le select de la page addResult
* @ params : id du coureur, année de la course souhaitée
* @ return : array () contenant la liste des courses présentes 
*           dans la bdd correspondant à l'année choisie
* (+ l'id de l'édition pour l'insert)
*/
function get_races_select($id_coureur, $year){
  $races = get_races_names_and_id($year);
  $all_races = $races->fetchAll(PDO::FETCH_ASSOC);
  $races_select = array();

  // Mise en forme du tableau pour le select
  foreach ($all_races as $value) 
  {
    $races_select[$value["nom"]] = $value['id'];
  }

  // Récupération des id des éditions déjà courues
  $all_results = get_results($id_coureur);
  $ran_races_id = $all_results-> fetchAll(PDO::FETCH_COLUMN, 2);
  $final_select = array();
  // Mise en maj des courses déjà courues
  foreach ($races_select as $race =>$id) 
  {
    if(in_array($id, $ran_races_id))
    {
      $final_select[strtoupper($race)] = $id;
    }
    else
    {
      $final_select[$race] = $id;      
    }
  }  
  return $final_select;   
}


function get_years(){
  $link = connect();
  return$link->query('SELECT YEAR(e.date) AS annee
                      FROM edition AS e');
}
/*récupère la liste des participants à une course donnée
* @return : PDO statement (liste coureurs + chronos)
* @params : String (le nom de la course sélectionnée)
*/
function get_participants($id_edition){
  $link = connect();
  return$link->query('SELECT c.nom, res.chrono, res.classement 
                        FROM resultats_courses AS res, coureur AS c
                        WHERE res.idcoureur = c.id
                        AND res.idcourse ='. $id_edition);
}