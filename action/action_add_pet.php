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
  
  $user = $_SESSION['user'];
  addPet($user, $_POST['npetName'], $_POST['nspecie'], $_POST['ngender'], $_POST['nsize'], $_POST['ncolor'], $_POST['bio']);

  header('Location : ../index.php');
?>