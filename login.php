<?php
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  include_once('templates/common/header_login_register.php');
  include_once('database/users.php');

  if(isLogged()) {
    header('Location: ../error404.php');
  }

  include_once('templates/user/login.php');
  include_once('templates/common/footer.php');
?>
