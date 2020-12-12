<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/pets.php');      // loads the functions responsible for the users table

  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  else {
    $user = $_SESSION['user'];
    updateFavoriteList($user, $_GET['idPet']);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>