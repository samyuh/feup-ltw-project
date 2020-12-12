<?php
  include_once('./includes/session.php');
  include_once('./includes/database.php');

  include_once('database/pets.php');
  include_once('database/adopt_pet.php');
  include_once('database/users.php');
  
  $pet = getPet($_GET['idPet']);

  if(empty($pet)) {
    header('Location: ../error404.php');
  }

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
