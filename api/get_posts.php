<?php
  /* Initialize Session and Database */
  include_once('../includes/session.php');
  include_once('../includes/database.php');

  /* Database Managers Files */ 
  include_once('../database/pets_profile.php');  

  /* Verifications and set variables */

  $posts = getPosts($_POST['idPet']);

  // JSON encode
  echo json_encode($posts);
?>


