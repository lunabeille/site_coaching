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
  return $link->query('SELECT * FROM coureur WHERE id ='.$id);
}

//récuperer les resultats d'un coureur
function get_results($id){
  $link = connect();
  //on récupere les resultats
  return $link->query('SELECT * FROM resultats_courses WHERE idcoureur='.$id);
}

//pb : il faut que la requete ne modifie QUE le champs modifiés !
//requete prepraree utile ici ?
function update_profile($values, $id){
  $link = connect();
  extract($values);
  $req = "UPDATE coureur SET nom = $nom, 
                            age = $age, 
                            ville = $ville,
                            vma = $vma,
                            rp10 = $rp10,
                            rpsemi = $rpsemi
                          WHERE id = $id";
  $res = $link->exec($req);
  if($res)
  {
    echo 'Changements bien pris en compte';
  }
  else
  {
    echo('ca a pas marché');
  }
}
