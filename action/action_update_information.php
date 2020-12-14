<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php');
  
  /* Verifications and set variables */
  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  
  $user = $_SESSION['user'];
  $new_gender = $_POST['gender']; 
  $new_age = $_POST['age'];   
  $new_location = $_POST['location'];   
  $password = $_POST['password'];

  if(updateUserInfo($user, $new_gender, $new_age, $new_location, $password)) {
    $_SESSION['user']['gender'] = $new_gender; 
    print($new_gender);
    $_SESSION['user']['new_age'] = $new_age; 
    print($new_age);
    $_SESSION['user']['new_location'] = $new_location;  
    print($new_location);
    header('Location: ../index.php');
  }
  else {
    header('Location: ../update.php');
  }
?>