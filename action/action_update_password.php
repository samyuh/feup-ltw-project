<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php');
  
  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  $user = $_SESSION['user'];
  $new_password = $_POST['new_password'];
  
  if(validPassword($password)) {
    if(updatePassword($user, $new_password, $_POST['password'])) {
      $options = ['cost' => 12];
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT, $options);

      $_SESSION['user']['password'] = $hashed_password; 

      header('Location: ../index.php');
    }
    else {
      header('Location: ../update.php');
    }
  }
?>