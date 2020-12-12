<?php
  include_once('../includes/session.php');
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  
  $user = $_SESSION['user'];
  $new_password = $_POST['new_password'];

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if(updatePassword($user, $new_password, $_POST['password'])) {
    $options = ['cost' => 12];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT, $options);

    $_SESSION['user']['password'] = $hashed_password; 

    header('Location: ../index.php');
  }
  else {
    header('Location: ../update.php');
  }
?>