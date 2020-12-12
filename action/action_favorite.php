<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/pets.php'); 

  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  $user = $_SESSION['user'];
  updateFavoriteList($user, $_GET['idPet']);
  
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>