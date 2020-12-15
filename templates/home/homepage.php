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
      <article>
        <img class="profile-image" src="./images/pet-profile/pet-<?= htmlentities($article['idPet']) ?>/profile.jpg" width="300" height="300" alt="Pet Profile Picture">
        <p>
          <a class="profile-pet" title="Visit <?= htmlentities($article['petName']) ?>'s Profile" href="pet_profile.php?idPet=<?=$article['idPet']?>"><?= htmlentities($article['petName']) ?>
          </a>
        </p>
        <aside class="profile-overlay">
          <p>Raça: <?= htmlentities($article['specie']) ?></p>
          <p>Tamanho: <?= htmlentities($article['size']) ?></p>
          <p>Cor:  <?= htmlentities($article['color']) ?></p>
        </aside>
      </article>
    <?php } ?>
  </div>
</div>


