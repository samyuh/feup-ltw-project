<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');


  $articles = getAllDogs();

  $petName = isset($_POST["search"]) ? $_POST["search"] : '';

  //$articles = getPetsByName($petName);

  include_once('templates/common/header.php');
  include_once('templates/home/homepage.php');
  include_once('templates/common/footer.php');
?>
