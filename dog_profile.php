<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');
  
  $pet = getPet($_GET['idPet']);

  include_once('templates/common/header.php');
  include_once('templates/pet/dog_profile.php');
  include_once('templates/common/footer.php');
?>
