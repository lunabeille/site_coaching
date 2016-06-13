<?php 
require_once("utils.php");

/* Récupère les infos du coureur pour la page d'accueil
* @return : PDO Statement 
* @params : int (id du coureur qui s'est authentifié
*/
function get_profile($id){
  $link = connect();
  return $link->query('SELECT id, nom, age, ville, vma, HOUR(rp10)AS rp10h, MINUTE(rp10) AS rp10min, SECOND(rp10) AS rp10sec,HOUR(rpsemi)AS rpsemih, MINUTE(rpsemi) AS rpsemimin, SECOND(rpsemi) AS rpsemisec, commentaire
                       FROM coureur WHERE id ='. $id);
}

/* met à jour les informations concernant un coureur
* @return true si udpate ok, false sinon
* @params: $values : array (nouvelles valeurs) ; $id : id du coureur
*/
function update_profile($values, $id){
  $link = connect();

  //mise au format date des rp10 et rpSemi 
  $chrono10 = $values["rp10h"] . ':' . $values["rp10min"] . ':' . $values["rp10sec"];
  $chrono21 = $values["rp1semih"] . ':' . $values["rpsemimin"] . ':' . $values["rpsemisec"];
  try 
  {
    $req = $link->prepare("UPDATE coaching.coureur 
                          SET  age = :age, 
                          ville = :ville,
                          vma = :vma,
                          rp10 = :chrono10,
                          rpsemi = :chrono21
                          WHERE coureur.id = $id");
    $req->execute(array(':age' => $values["age"],
                      ':ville' => $values["ville"],
                      ':vma' => $values["vma"],
                      ':chrono10' => $chrono10,
                      ':chrono21' => $chrono21));
  $ok = true;
  }
  catch (PDOException $e)
  {
    $ok = false;
  }
  return $ok;
}

/* Vérifie l'existence du couple login/password pour 
* l'authentification et l'accès au site.
* @return : true si ok, false sinon
* @params : login et passwd rentrés dans le formulaire
*/
function check_user($login, $passwd)
{
  $link = connect();
  $passwd = $link->quote($passwd);
  $req = $link->prepare('SELECT * FROM authentification 
                         WHERE login =:login');
  $req->bindValue('login', $login, PDO::PARAM_STR);
  $req->execute();
  $user = $req->fetch(PDO::FETCH_ASSOC);
  if($req->rowCount() > 0)
  {
    if("'".$user['passwd']."'" == $passwd)

    {
      return true;
    }
    return false;
  }
}

/*
*  Retourne l'id de l'utilisateur pour le fournir 
* à $_SESSION
* @ return : int (user id)
* @ params : le username
*/
function get_user_id($login)
{
  $link=connect();
  $res = $link->query('SELECT id FROM authentification WHERE login ="' . $login . '"');
  return $res->fetch(PDO::FETCH_ASSOC); 
}