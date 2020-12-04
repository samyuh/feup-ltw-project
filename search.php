<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/dogs.php');

  //$articles = getAllDogs();
  
  /*
  $articles = getDogsByName($_POST["nameSearch"]);
  $articles = getDogsByGender($_POST["genderSearch"]);
  $articles = getDogsBySize($_POST["sizeSearch"]);
  $articles = getDogsByColor($_POST["colorSearch"]);
  */
  //$articles = getDogsByName('p');
  //$articles = getDogsByAll('','dog','male','medium','brown');

  $articles = getDogsByAll($_POST["nameSearch"],$_POST["speciesSearch"],$_POST["genderSearch"],$_POST["sizeSearch"],$_POST["colorSearch"]);
  


  include_once('templates/common/header.php');
  include_once('search_advanced.php');
  include_once('display_pets.php');
  include_once('templates/common/footer.php');
?>