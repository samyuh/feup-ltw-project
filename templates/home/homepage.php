<section id="homepage">
  <article>
  <section id="homepage">
  <div class="profileGrid">
  <?php
    $column = 1;
    foreach($articles as $article) {
      if ($column == 1){
        $column = 2;
         ?>
  
    <section id="profile">
      <div class="image">
        <img src="./images/dog.JPG" width="200" height="200" alt="">
      </div>
      <div class="info">
        <p><b><?=$article['petName']?></b></p>
        <p>Raça: <?=$article['specie']?></p>
        <p>Idade: </p>
        <p>Tamanho:  <?=$article['size']?></p>
        <p>Cor:  <?=$article['color']?></p>
        <p>Localização:  </p>
      </div>
    </section>
      <?php } else { 
        $column = 1;?>
    <section id="profile">
      <div class="image">
        <img src="./images/dog.JPG" width="200" height="200" alt="">
      </div>
      <div class="info">
        <p><b><?=$article['petName']?></b></p>
        <p>Raça: <?=$article['specie']?></p>
        <p>Idade: </p>
        <p>Tamanho:  <?=$article['size']?></p>
        <p>Cor:  <?=$article['color']?></p>
        <p>Localização:  </p>
      </div>
    </section>
  <?php }} ?>
  </div>
  </section>
  </article>
  
</section>


