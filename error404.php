<?php 
  include_once('./includes/session.php');

  header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);

  include_once('database/connection.php');
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  
  include_once('templates/common/header.php');
  include_once('templates/home/error404page.php');
  include_once('templates/common/footer.php');
?>
