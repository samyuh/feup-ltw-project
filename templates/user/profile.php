<div id="owner">
  <div class="profile-header">
    <section class="profile-image">
      <img src="./images/user/user-<?=$user['idUser']?>.jpg" width="200" height="200" alt="Profile Picture">
    </section>
    <section class="profile-text">
      <h1><?=$user['username']?></h1>
    </section>
  </div>

  <div id="profile-grid">
    <section id="information-profile">
      <h2>Information</h2>
      <p>Gender: <?= htmlentities($user['gender']) ?></p>
      <p>Age: <?= htmlentities($user['age']) ?></p>
      <p>Location: <?= htmlentities($user['location']) ?></p>
    </section>
    <section id="favorite-pets">
      <h2>Favorite Pets</h2>
      <?php foreach($userPets as $fav) { ?>
        <article class="unique-favorite-pet">
          <img src="./images/pet-profile/pet-<?=$fav['idPet']?>/profile.jpg" width="45" height="45" alt="Pet Images">
          <p><a href="pet_profile.php?idPet=<?=$fav['idPet']?>"><?= htmlentities($fav['petName']) ?></a></p>
        </article>
      <?php } ?>
    </section>
    <section id="adoption-pets">
      <h2>Pets for Adoption</h2>
      <?php foreach($toAdoptPets as $fav) { ?>
        <article class="unique-adoption-pet">
          <img src="./images/pet-profile/pet-<?=$fav['idPet']?>/profile.jpg" width="45" height="45" alt="Pet Images">
          <p><a href="pet_profile.php?idPet=<?=$fav['idPet']?>"><?= htmlentities($fav['petName']) ?></a></p>
        </article>
      <?php } ?>
    </section>
    <section id="adopted">
      <h2>Adopted Pets!</h2>
      <?php foreach($adoptPets as $fav) { ?>
        <article class="unique-adopted">
          <img src="./images/pet-profile/pet-<?=$fav['idPet']?>/profile.jpg" width="45" height="45" alt="Pet Images">
          <p><a href="pet_profile.php?idPet=<?=$fav['idPet']?>"><?= htmlentities($fav['petName']) ?></a></p>
        </article>
      <?php } ?>
    </section>
  </div>
</div>