<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
                           
  include_once('../database/pets.php');      // loads the functions responsible for the users table

  if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {

  }
  else {
    $user = $_SESSION['user'];
    updateFavoriteList($user, $_POST['idPet']);
  }

?>