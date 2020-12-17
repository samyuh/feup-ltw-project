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
  $new_gender = $_POST['gender']; 
  $new_age = $_POST['age'];   
  $new_location = $_POST['location'];   
  $password = $_POST['password'];

  if(validGender($new_gender) && validNumber($new_age) && validText($new_location) && validPassword($password)) {
    if(updateUserInfo($user, $new_gender, $new_age, $new_location, $password)) {
      $_SESSION['user']['gender'] = $new_gender; 
      $_SESSION['user']['age'] = $new_age; 
      $_SESSION['user']['location'] = $new_location;  

      header('Location: ../index.php');
    }
    else {
      header('Location: ../update.php');
    }
  }
  else {
    header('Location: ../register.php');
  }
?>