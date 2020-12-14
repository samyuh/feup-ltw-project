<section id="homepage">
  <section id="intro">
    <h1>Welcome to Pet Shelter!</h1>
    <h2>Here are some of our pets.</h2>

    <?php
    if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
    ?>
    <section id="found-pet">
      <p><a title="Add New Pet" href=add_pet.php>Add a Pet</a></p>
    </section>
    <?php
      }
    ?>

  </section>
  <section id="dogs_information">
  <?php
    foreach($articles as $article) {?>
    <article>
    <section id="homepage_profile">
      <img class="image" src="./images/pet-profile/pet-<?=$article['idPet']?>/profile.jpg" width="300" height="300">
      <p><a class="petname" title="Visit <?=$article['petName']?>'s Profile" href=dog_profile.php?idPet=<?=$article['idPet']?>><?=$article['petName']?></a></p>
      <div class="overlay">
        <div class="text">
          <p>Raça: <?=$article['specie']?></p>
          <p>Idade: </p>
          <p>Tamanho:  <?=$article['size']?></p>
          <p>Cor:  <?=$article['color']?></p>
          <p>Localização:  </p>
        </div>
      </div>
    </section>
    </article>
  <?php } ?>
  </section>
  
  
</section>


