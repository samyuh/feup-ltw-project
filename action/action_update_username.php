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
  $new_name = $_POST['new_username']; 

  if(validUsername($new_name)) {
    if(updateUsername($user, $new_name, $_POST['password'])) {
      $_SESSION['user']['username'] = $new_name; 
      
      header('Location: ../index.php');
    }
    else {
      header('Location: ../update.php');
    }
  }
  else {
    header('Location: ../update.php');
  }
?>