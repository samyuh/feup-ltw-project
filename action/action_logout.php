<?php
  include_once('../includes/session.php');
  
  $_SESSION = array();
  session_destroy();
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>