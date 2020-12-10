<?php
  include_once('../includes/session.php');
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  
  $user = $_SESSION['user'];
  $new_name = $_POST['new_username'];

  if(updateUsername($user, $new_name, $_POST['password'])) {
    $_SESSION['user']['username'] = $new_name; 
    header('Location: ../index.php');
  }
  else {
    header('Location: ../update.php');
  }
?>