<?php 
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  
  include_once('templates/common/header.php');
  include_once('templates/home/error404page.php');
  include_once('templates/common/footer.php');
?>
