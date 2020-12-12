<?php
  include_once('../includes/session.php');
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  
  $user = $_SESSION['user'];
  $password = $_POST['password'];

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if(deleteUser($user, $password)) {
    $_SESSION = array();
    session_destroy();

    header('Location: ../index.php');
  }
  else {
    header('Location: ../update.php');
  }
?>