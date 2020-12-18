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

  $idUser = $_SESSION['user']['idUser'];
  $idPet = $_GET['idPet'];
  $petName = $_POST['npetName'];
  $bio = $_POST['bio'];
  $specie =  $_POST['nspecie'];
  $gender =  $_POST['ngender'];
  $size =  $_POST['nsize'];
  $color =  $_POST['ncolor'];
  
  
  if(validNumber($idPet) && validName($petName) && validSpecie($specie) && validGender($gender) && validSize($size) && validText($color) && validText($bio)) {
    updatePet($idUser, $idPet, $petName, $bio, $specie, $gender, $size, $color);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>