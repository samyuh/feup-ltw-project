<div id="homepage">
  <section id="intro">
    <h1>Welcome to Pet Shelter!</h1>
    <h2>Here are some of our pets.</h2>
    <?php if (isLogged()) {?>
      <section id="found-pet">
        <p><a title="Add New Pet" href="add_pet.php">Add a Pet</a></p>
      </section>
    <?php } ?>
  </section>
  
  <div id="dogs_information">
    <section id="homepage_profile">
    <?php foreach($articles as $article) {?>
      <article>
        <img class="image" src="./images/pet-profile/pet-<?= htmlentities($article['idPet']) ?>/profile.jpg" width="300" height="300" alt="Pet Profile Picture">
        <p>
          <a class="petname" title="Visit <?= htmlentities($article['petName']) ?>'s Profile" href="dog_profile.php?idPet=<?=$article['idPet']?>"><?= htmlentities($article['petName']) ?>
          </a>
        </p>
        <div class="overlay">
          <div class="text">
            <p>Raça: <?= htmlentities($article['specie']) ?></p>
            <p>Tamanho: <?= htmlentities($article['size']) ?></p>
            <p>Cor:  <?= htmlentities($article['color']) ?></p>
          </div>
        </div>
      </article>
    <?php } ?>
    </section>
  </div>
</div>


