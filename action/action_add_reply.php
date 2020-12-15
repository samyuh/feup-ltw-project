<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');

  /* Database Managers Files */
  include_once('../database/adopt_pet.php');

  addAnswer($_POST['idQuestion'], $_POST['question']);  
?>