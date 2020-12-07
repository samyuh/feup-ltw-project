<?php
  session_start();                         // starts the session
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  
  $user = $_SESSION['user'];
  $new_password = $_POST['new_password'];

  if(updatePassword($user, $new_password, $_POST['password'])) {
    $hashed_new_password = sha1($new_password);
    $_SESSION['user']['password'] = $hashed_new_password; 
    header('Location: index.php');
  }
  else {
    header('Location: update.php');
  }
?>