<section id="homepage">
  
  <?php
    foreach($articles as $article) {?>
    <article>
    <section id="profile">
      <div class="image">
        <img src="./images/dog.JPG" width="200" height="200" alt="">
      </div>
      <div class="info">
        <p><a href=dog_profile.php?idPet=<?=$article['idPet']?>><?=$article['petName']?></a></p>
        <p>Raça: <?=$article['specie']?></p>
        <p>Idade: </p>
        <p>Tamanho:  <?=$article['size']?></p>
        <p>Cor:  <?=$article['color']?></p>
        <p>Localização:  </p>
      </div>
    </section>
    </article>
  <?php } ?>
</section>


