<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  
  $pet = getPet($_GET['idPet']);
  $questions = getQuestions($_GET['idPet']);
  $posts = getPosts($_GET['idPet']);
  
  include_once('templates/common/header.php');
  
  include_once('templates/common/footer.php');
?>