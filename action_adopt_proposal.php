<?php
  session_start();                         // starts the session
  include_once('database/connection.php'); // connects to the database
  include_once('database/users.php');      
  include_once('database/adopt_pet.php');

  if (!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) {

  }
  else {
    $user = $_SESSION['user'];
    updateAdoptionProposal($user, $_GET['idPet']);
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>