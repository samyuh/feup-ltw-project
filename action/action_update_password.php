<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/regex.php');
  include_once('../database/users.php');
  include_once('../database/pets.php');  
  include_once('../database/pets_adoption.php');  
  include_once('../database/pets_profile.php');    
  
  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  $user = $_SESSION['user'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];
  $password = $_POST['password'];
  
  if((validPassword($new_password) && validPassword($confirm_password))) {
      if(updatePassword($user, $new_password, $password) && ($new_password == $confirm_password)) {
        $options = ['cost' => 12];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT, $options);

        $_SESSION['user']['password'] = $hashed_password; 

        header('Location: ../index.php');
      }
      else {
        header('Location: ../update.php');
      }
  }
?>