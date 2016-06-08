<?php 
require_once("utils.php");
/* Récupère les infos du coureur pour la page d'accueil
* @return : PDO Statement 
* @params : int (id du coureur qui s'est authentifié
*/
function get_profile($id){
  $link = connect();
  return $link->query('SELECT id, nom, age, ville, vma, HOUR(rp10)AS rp10h, MINUTE(rp10) AS rp10min, SECOND(rp10) AS rp10sec, rpsemi, commentaire
                       FROM coureur WHERE id ='. $id);
}

/* met à jour les informations concernant un coureur
* @return true si udpate ok, false sinon
* @params: $values : array (nouvelles valeurs) ; $id : id du coureur
*/
function update_profile($values, $id){
  $link = connect();
  extract($values);

  $chrono10 = "$rp10h:$rp10min:$rp10sec";
  try {
    $req = "UPDATE coaching.coureur 
            SET  age = '$age', 
                 ville = '$ville',
                 vma = '$vma',
                 rp10 = '$chrono10'
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