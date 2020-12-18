<div id="homepage">
  <section id="homepage-intro">
    <h1>Welcome to Pet Shelter!</h1>
    <h2>Here are some of our pets.</h2>
    <?php if (isLogged()) {?>
      <aside class="found-pet">
        <p><a title="Add New Pet" href="add_pet.php">Add a Pet</a></p>
      </aside>
    <?php } ?>
  </section>
  
  <div id="homepage-profile">
    <?php foreach($articles as $article) {?>
      <article class="homepage-profile-pet">
        <section class="card">
          <img class="profile-image" src="./images/pet-profile/pet-<?= htmlentities($article['idPet']) ?>/profile.jpg" width="300" height="300" alt="Pet Profile Picture">
          <aside class="profile-overlay">
            <p>Race: <?= htmlentities($article['specie']) ?></p>
            <p>Size: <?= htmlentities($article['size']) ?></p>
            <p>Color:  <?= htmlentities($article['color']) ?></p>
          </aside>
        </section>
        <p>
          <a class="profile-pet" title="Visit <?= htmlentities($article['petName']) ?>'s Profile" href="pet_profile.php?idPet=<?=$article['idPet']?>"><?= htmlentities($article['petName']) ?>
          </a>
        </p>
      </article>
    <?php } ?>
  </div>
</div>


