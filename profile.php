<?php
  /* Initialize Session and Database */
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  /* Database Managers Files */
  include_once('database/users.php');
  include_once('database/pets.php');  
  include_once('database/pets_adoption.php');  
  include_once('database/pets_profile.php');  
  
  /* Verifications and set variables */
  $user = getUser($_GET['user']);
  if(empty($user)) {
    header('Location: ../error404.php');
  }

  $userPets = getFavoritePets($user);
  $adoptPets = getAdoptPets($user);
  $toAdoptPets = getAllOwner($user);
  
  /* HTML Code */
  include_once('templates/common/header.php');
  include_once('templates/common/notifications.php');
  include_once('templates/user/profile.php');
  include_once('templates/common/footer.php');
?>
