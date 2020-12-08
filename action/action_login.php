<?php
  session_start();                         // starts the session
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table

  if (userExists($_POST['username'], $_POST['password'])) { // test if user exists
    $user = userExists($_POST['username'], $_POST['password']);
    $_SESSION['user'] = $user;

    header('Location: ../index.php');
  }
  else {
    header('Location: ../login.php');
  }
?>