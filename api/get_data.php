<?php
  include_once('../includes/session.php');
  include_once('../includes/database.php');
  
  include_once('../database/pets.php');

  $nameSearch = isset($_POST["nameSearch"]) ? $_POST["nameSearch"] : '';
  $genderSearch = isset($_POST["genderSearch"]) ? $_POST["genderSearch"] : '';
  $speciesSearch = isset($_POST["speciesSearch"]) ? $_POST["speciesSearch"] : '';
  $sizeSearch = isset($_POST["sizeSearch"]) ? $_POST["sizeSearch"] : '';
  $colorSearch = isset($_POST["colorSearch"]) ? $_POST["colorSearch"] : '';

  $message = getPetsByAll($nameSearch,$speciesSearch,$genderSearch,$sizeSearch,$colorSearch);

  // JSON encode
  echo json_encode($message);
?>