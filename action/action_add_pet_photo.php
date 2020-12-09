<?php
  session_start();                         // starts the session
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');  
  include_once('../database/pets.php');    
  include_once('../database/adopt_pet.php');

  addPetPhoto($_GET['idPet']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>