<section id="dog">
  <div class="profileHeader">
    <div class="header">
        <svg width="1920" height="210">
            
            <rect width="1920" height="210" style="fill:rgb(255,223,211)" />
        </svg> 
    </div>
    <div class="image">
      <img src="../images/dog.JPG" width="200" height="200" alt="">
    </div>
    <div class="name">
      <h1><?=$pet['petName']?></h1>
    </div>
  </div>
  <div class="infoGrid">
  <?php
  if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
    if(isFavorited($_SESSION['user'], $pet['idPet'])) {
    ?>
    <section id="favorite">
      <form action="action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="submit" value="Favorite">
      </form>
    </section>
    <?php } else {?>
    <section id="remove">
      <form action="action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="submit" value="Remove from Favorite">
      </form>
    </section>
    <?php } } ?>
    <section id="information">
      <h2>Informação </h2>
      <p>Raça: <?=$pet['specie']?></p>
      <p>Genero: <?=$pet['gender']?></p>
      <p>Tamanho: <?=$pet['size']?></p>
      <p>Cor: <?=$pet['color']?></p>
      <p>Localização: </p>
    </section>
    <section id="photos">
      <h2>Fotos</h2>
    </section>
    <section id="description">
      <h2>Descrição</h2>
      <p> Descrição </p>
    </section>
  </div>  
</section>