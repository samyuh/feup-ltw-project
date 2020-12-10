<?php
  include_once('./includes/session.php');

  include_once('database/connection.php');
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  include_once('database/users.php');
  
  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  $pet = getPet($_GET['idPet']);
  $posts = getPosts($_GET['idPet']);
  
  include_once('templates/common/header.php');
  include_once('templates/pet/dog_update.php');
  include_once('templates/common/footer.php');
?>
