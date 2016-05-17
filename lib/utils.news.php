<?php 

require_once('utils.php');

function get_entrainement()
{
  $link = connect(); 
  return $link->query("SELECT * FROM news WHERE type=\"Entraînement\"");
}

function get_resultats()
{
  $link = connect(); 
  return $link->query("SELECT * FROM news WHERE type=\"Résultats\"");
}

function get_competition()
{
  $link = connect(); 
  return $link->query("SELECT * FROM news WHERE type=\"Compétition\"");
}

function get_autre()
{
  $link = connect(); 
  return $link->query("SELECT * FROM news WHERE type=\"Autre\"");
}