<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/users.php');      // loads the functions responsible for the users table
  include_once('../database/pets.php');      // loads the functions responsible for the users table
  include_once('../database/adopt_pet.php');      // loads the functions responsible for the users table

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  updatePet($_GET['idPet'], $_POST['npetName'], $_POST['nspecie'], $_POST['ngender'], $_POST['nsize'], $_POST['ncolor']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>