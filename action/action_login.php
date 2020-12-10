<?php
  include_once('../includes/session.php'); 
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (userExists($username, $password)) { // test if user exists
    $_SESSION['user'] = userExists($username, $password);

    header('Location: ../index.php');
  }
  else {
    header('Location: ../login.php');
  }
?>