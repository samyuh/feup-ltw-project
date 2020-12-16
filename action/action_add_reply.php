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

  $idQuestion = $_POST['idQuestion'];
  $author = $_SESSION['user']['username'];
  $question = $_POST['question'];

  addAnswer($idQuestion, $author, $question);  
?>