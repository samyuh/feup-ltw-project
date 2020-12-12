<?php
  /* Initialize Session and Database */
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  /* Database Managers Files */
  include_once('database/users.php');

  /* Verifications and set variables */
  if(isLogged()) {
    header('Location: ../error404.php');
  }

  /* HTML Code */
  include_once('templates/common/header_login_register.php');
  include_once('templates/user/register.php');
  include_once('templates/common/footer.php');
?>
