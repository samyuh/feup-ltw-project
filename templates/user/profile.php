<section id="owner">
  <div class="profileHeader">
    <div class="header">
    </div>
    <div class="image">
      <img src="../images/user/user-<?=$user['idUser']?>.jpg" width="200" height="200" alt="">
    </div>
    <div class="name">
      <h1><?=$user['username']?></h1>
    </div>
  </div>
  <div class="infoGrid">
    <section id="information_person">
      <h2>Information</h2>
      <p>Gender: <?=$user['gender']?></p>
      <p>Age: <?=$user['age']?></p>
      <p>Location: <?=$user['location']?></p>
      <p>Favorite Animal: </p>
    </section>
    <section id="favPets">
      <h2>Favorite Pets</h2>
      <?php foreach($userPets as $fav) {?>
        <p><a href=dog_profile.php?idPet=<?=$fav['idPet']?>><?=$fav['petName']?></a></p>
      <?php } ?>
    </section>
    <section id="petsForAdoption">
      <h2>Pets for Adoption</h2>
      <?php foreach($toAdoptPets as $fav3) {?>
        <p><a href=dog_profile.php?idPet=<?=$fav3['idPet']?>><?=$fav3['petName']?></a></p>
      <?php } ?>
    </section>
    <section id="adopted">
      <h2>Adopted Pets!</h2>
      <?php foreach($adoptPets as $fav2) {?>
        <p><a href=dog_profile.php?idPet=<?=$fav2['idPet']?>><?=$fav2['petName']?></a></p>
      <?php } ?>
    </section>
  </div>  
</section>