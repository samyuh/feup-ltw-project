<?php
  include_once('../includes/session.php');
  
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  include_once('../database/pets.php');      // loads the functions responsible for the users table
  include_once('../database/adopt_pet.php');      // loads the functions responsible for the users table

  if ($_SESSION['csrf'] != $_GET['token']) {
    header('Location: ../error404.php');
  }
  if(!isLogged()) {
    header('Location: ../error404.php');
  }
  
  updatePost($_GET['id'], $_POST['post']);

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>