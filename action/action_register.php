<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  /* Database Managers Files */
  include_once('../database/users.php');
  include_once('../database/pets.php');  
  include_once('../database/pets_adoption.php');  
  include_once('../database/pets_profile.php');     

  /* Verifications and set variables */
  $username = $_POST['username'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $location = $_POST['location'];
  $password = $_POST['password'];

  if(validUsername($username) && validGender($gender) && validAge($age) && validLocation($location) && validPassword($password)) {
    if(insertUser($username, $gender, $age, $location, $password)) {
      header('Location: ../login.php');
    }
    else {
      header('Location: ../register.php');
    }
  }
  else {
    header('Location: ../register.php');
  }
?>