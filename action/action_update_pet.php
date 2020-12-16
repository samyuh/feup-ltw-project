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
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }

  $petName = $_POST['npetName'];
  $specie =  $_POST['nspecie'];
  $gender =  $_POST['ngender'];
  $size =  $_POST['nsize'];
  $color =  $_POST['ncolor'];
  $bio = $_POST['nspecie'];
  
  if(validName($petName) && validSpecie($specie) && validGender($gender) && validSize($size) && validColor($color) && validText($bio)) {
    updatePet($_GET['idPet'], $petName, $bio, $specie, $gender, $size, $color);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>