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
  $petName = $_POST['npetName'];
  $specie =  $_POST['nspecie'];
  $gender =  $_POST['ngender'];
  $size =  $_POST['nsize'];
  $color =  $_POST['ncolor'];
  $bio = $_POST['nspecie'];

  if(validName($petName) && validSpecie($specie) && validGender($gender) && validSize($size) && validText($color) && validText($bio)) {
    addPet($user, $_POST['npetName'], $_POST['nspecie'], $_POST['ngender'], $_POST['nsize'], $_POST['ncolor'], $_POST['bio']);
    
    header('Location: ../index.php');
  }
  else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  
?>