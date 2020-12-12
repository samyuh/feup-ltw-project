<?php
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  include_once('database/pets.php');

   $articles = isset($_POST["search"]) ? getPetsByName($_POST["search"]) : getAllDogs();

  include_once('templates/common/header.php');
  include_once('templates/home/homepage.php');
  include_once('templates/common/footer.php');
?>
