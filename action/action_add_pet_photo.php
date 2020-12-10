<?php
  include_once('../includes/session.php');

  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');  
  include_once('../database/pets.php');    
  include_once('../database/adopt_pet.php');

  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  addPetPhoto($_GET['idPet']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>