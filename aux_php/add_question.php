<?php
  session_start();                         // starts the session
  include_once('../database/connection.php'); // connects to the database
  include_once('../database/users.php');      // loads the functions responsible for the users table
  include_once('../database/adopt_pet.php');      // loads the functions responsible for the users table

  
  addQuestion($_POST['idPet'], $_POST['question']);
  
  
?>