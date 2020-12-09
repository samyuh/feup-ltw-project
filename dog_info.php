<?php
  session_start();
  include_once('database/connection.php');
  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  
  $pet = getPet($_GET['idPet']);
  $owner = getPetOwner($_GET['idPet']);
  $adopted = getPetAdopted($_GET['idPet']);
  $questions = getQuestions($_GET['idPet']);
  $posts = getPosts($_GET['idPet']);
  $proposals = getAdoptionProposalList($_GET['idPet']);
  $photos = getAllPhotos($_GET['idPet']);

  include_once('templates/common/header.php');
  include_once('templates/pet/dog_information.php');
  include_once('templates/common/footer.php');
?>
