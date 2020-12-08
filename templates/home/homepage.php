<section id="homepage">
  
  <?php
    foreach($articles as $article) {?>
    <article>
    <section id="homepage_profile">
      <img src="./images/dog.JPG" width="300" height="300" alt="" class="image">
      <p><a href=dog_profile.php?idPet=<?=$article['idPet']?>><?=$article['petName']?></a></p>
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
  
  <?php
    if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
    ?>
  <section id="found-pet">
    <p><a href=add_pet.php>Add a Pet!</a></p>
  </section>
  <?php
    }
  ?>
</section>


