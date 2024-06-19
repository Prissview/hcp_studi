<?php 
  require_once __DIR__ . "/lib/session.php";
  
  

//prevention contre les attaques de fixation de session
  session_regenerate_id(true);

//supprime les données du serveur
  session_destroy();

//supprime les données du tableau $SESSION
  unset($SESSION);

//redirige vers la page de conection à chaque fin de connection
  header('location: login.php');