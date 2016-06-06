<?php 

class News extends Controler
{
  public function execute($params = array())
  {
    require_once('utils.news.php');
    $data = array();

    // 1. Récupération des news section entrain.
    $ent = get_entrainement();
    if($ent != NULL)
    {
      $data['entr'] = $ent->fetch(PDO::FETCH_ASSOC);
    }

    // 2. Récupération des news section compet.
    $compet = get_competition();
    if($compet != NULL)
    {
      $data['compet'] = $compet->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Récupération des news section résultats
    $res = get_resultats();
    if($res != NULL)
    {
      $data['result'] = $res->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. Récupération des news "autre"
    $other = get_autre();
    if($other != NULL)
    {
      $data['autre'] = $other->fetch(PDO::FETCH_ASSOC);
    }
    return $data;
  }
}