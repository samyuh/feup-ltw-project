<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/pets.php');
  include_once('../database/users.php');

  /* Verifications and set variables */
  if(isLogged()) {
    $user = $_SESSION['user'];
    updateFavoriteList($user, $_POST['idPet']);
  }

?>