<?php
  include_once('../includes/session.php');
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');  
  include_once('../database/pets.php');    
  include_once('../database/adopt_pet.php');

  $user = $_SESSION['user'];
  addPet($user, $_POST['npetName'], $_POST['nspecie'], $_POST['ngender'], $_POST['nsize'], $_POST['ncolor']);

  header('Location : ../index.php');
?>