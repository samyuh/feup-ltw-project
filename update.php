<?php
  include_once('./includes/session.php');

  include_once('templates/common/header.php');
  include_once('database/users.php');

  if(!isLogged()) {
    header('Location: ../error404.php');
  }

  include_once('templates/user/update.php');
  include_once('templates/common/footer.php');
?>