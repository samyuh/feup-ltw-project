<?php
  session_start();                         // starts the session
  include_once('database/connection.php'); // connects to the database
  include_once('database/users.php');      // loads the functions responsible for the users table

  if(insert($_POST['username'], $_POST['gender'], $_POST['age'], $_POST['location'], $_POST['password'])) {
   header('Location: login.php');
  }
  else {
    header('Location: register.php');
  }
?>