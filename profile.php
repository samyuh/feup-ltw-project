<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');
  include_once('database/pets.php');
  
  $user = getUser($_GET['user']);
  $userPets = getFavoritePets($user);
  $adoptPets = getAdoptPets($user);
  
  include_once('templates/common/header.php');
  include_once('templates/user/profile.php');
  include_once('templates/common/footer.php');
?>
