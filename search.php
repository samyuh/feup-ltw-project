<?php
  /* Initialize Session and Database */
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  /* Database Managers Files */
  include_once('./database/pets.php');

  /* HTML Code */
  include_once('templates/common/header.php');
  include_once('templates/home/search_advanced.php');
  include_once('templates/common/footer.php');
?>