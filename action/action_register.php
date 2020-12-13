<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php'); 

  /* Verifications and set variables */
  if(insertUser($_POST['username'], $_POST['gender'], $_POST['age'], $_POST['location'], $_POST['password'])) {
   header('Location: ../login.php');
  }
  else {
    header('Location: ../register.php');
  }
?>