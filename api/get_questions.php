<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');

  /* Database Managers Files */
  include_once('../database/adopt_pet.php');

  $questions = getQuestions($_POST['idPet']);

  echo json_encode($questions);
?>