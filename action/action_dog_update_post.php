<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php');     
  include_once('../database/pets.php'); 
  include_once('../database/adopt_pet.php');

  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  updatePost($_GET['id'], $_POST['post']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>