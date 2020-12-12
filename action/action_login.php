<?php
  include_once('../includes/session.php'); 
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table

  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = checkUserPassword($username, $password);
  if ($user !== false) {
    $_SESSION['user'] = $user;

    header('Location: ../index.php');
  }
  else {
    print($user);
    header('Location: ../login.php');
  }
?>