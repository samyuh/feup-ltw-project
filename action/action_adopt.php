<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/users.php');      
  include_once('../database/adopt_pet.php');

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  else {
    $user = $_SESSION['user'];
    updateAdoptList($user, $_GET['idPet']);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>