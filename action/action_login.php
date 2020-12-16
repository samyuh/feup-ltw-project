<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php'); 
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php');
  include_once('../database/pets.php');  
  include_once('../database/pets_adoption.php');  
  include_once('../database/pets_profile.php');  

  /* Verifications and set variables */
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = checkUserPassword($username, $password);
  if ($user !== false) {
    $_SESSION['user'] = $user;

    header('Location: ../index.php');
  }
  else {
    header('Location: ../login.php');
  }
?>