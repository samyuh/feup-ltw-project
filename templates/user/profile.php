<section id="owner">
  <div class="profileHeader">
    <div class="header">
      <img src="../images/header.png" alt="">
    </div>
    <div class="image">
      <img src="../images/random_image.JPG" alt="">
    </div>
    <div class="name">
      <h1><?=$user['username']?></h1>
    </div>
  </div>
  <div class="infoGrid">
    <section id="information">
      <h2>Informação</h2>
      <p>Género: <?=$user['gender']?></p>
      <p>Idade: <?=$user['age']?></p>
      <p>Localização: <?=$user['location']?></p>
      <p>Animal Favorito: </p>
    </section>
    <section id="favPets">
      <h2>Animais Favoritos</h2>
      <?php foreach($userPets as $fav) {?>
        <p><a href=dog_profile.php?idPet=<?=$fav['idPet']?>><?=$fav['petName']?></a></p>
      <?php } ?>
    </section>
    <section id="petsForAdoption">
      <h2>Animais para Adoção</h2>
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