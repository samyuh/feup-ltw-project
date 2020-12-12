<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/users.php');      // loads the functions responsible for the users table
  
  $user = $_SESSION['user'];
  $new_name = $_POST['new_username'];

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if(updateUsername($user, $new_name, $_POST['password'])) {
    $_SESSION['user']['username'] = $new_name; 
    header('Location: ../index.php');
  }
  else {
    header('Location: ../update.php');
  }
?>