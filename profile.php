<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/users.php');

  
  $user = getUser($_GET['user']);

  

  include_once('templates/common/header.php');
  include_once('templates/user/profile.php');
  include_once('templates/common/footer.php');
?>
