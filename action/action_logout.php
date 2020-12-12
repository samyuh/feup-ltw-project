<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  $_SESSION = array();
  session_destroy();
  
  header('Location: ../index.php');
?>