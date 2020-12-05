<section id="owner">
  <div class="profileHeader">
    <div class="header">
      <img src="../images/header.png" width="1920" height="200" alt="">
    </div>
    <div class="image">
      <img src="../images/random_image.JPG" width="200" height="200" alt="">
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
    </section>
    <section id="question">
      <h2>Faz Uma Pergunta!</h2>
      <form>
        <label>
          <textarea name="question" cols="60" rows="17"></textarea>
        </label>
      </form>
    </section>
  </div>  
</section>