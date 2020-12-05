<?php
  session_start();                         // starts the session
  include_once('database/connection.php'); // connects to the database
  include_once('database/users.php');      // loads the functions responsible for the users table
  include_once('database/adopt_pet.php');      // loads the functions responsible for the users table

  if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {

  }
  else {
    addQuestion($_GET['idPet'], $_POST['question']);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>