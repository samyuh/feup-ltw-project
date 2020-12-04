<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/dogs.php');
  
  $pet = getPet($_GET['idPet']);

  include_once('templates/common/header.php');
  include_once('templates/profile/dog_profile.php');
  include_once('templates/common/footer.php');
?>
