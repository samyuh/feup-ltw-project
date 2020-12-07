<?php
  session_start();                         // starts the session
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  include_once('../database/pets.php');      // loads the functions responsible for the users table
  include_once('../database/adopt_pet.php');      // loads the functions responsible for the users table

  updatePet($_GET['idPet'], $_POST['npetName'], $_POST['nspecie'], $_POST['ngender'], $_POST['nsize'], $_POST['ncolor']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>