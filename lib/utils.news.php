<?php 

require_once('utils.php');

function get_entrainement()
{
  $link = connect(); 
  return $link->query('SELECT * FROM news 
                        WHERE type="Entrainement"
                        ORDER BY date');
}

function get_resultats()
{
  $link = connect(); 
  return $link->query('SELECT * FROM news 
                      WHERE type="Résultats"
                      ORDER BY date');
}

function get_competition()
{
  $link = connect(); 
  return $link->query('SELECT * FROM news 
                      WHERE type="Compétition"
                      ORDER BY date');
}

function get_autre()
{
  $link = connect(); 
  return $link->query("SELECT * FROM news WHERE type=\"Autre\"");
}