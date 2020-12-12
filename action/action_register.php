<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/users.php');      // loads the functions responsible for the users table

  if(insertUser($_POST['username'], $_POST['gender'], $_POST['age'], $_POST['location'], $_POST['password'])) {
   header('Location: ../login.php');
  }
  else {
    header('Location: ../register.php');
  }
?>