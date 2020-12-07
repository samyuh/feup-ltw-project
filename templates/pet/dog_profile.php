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
      <form action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="submit" value="Favorite">
      </form>
    </section>
    <?php } else {?>
    <section id="remove">
      <form action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="submit" value="Remove from Favorite">
      </form>
    </section>
    <?php } ?>

    <?php if(!isAdopted($pet['idPet']) && !isOwner($_SESSION['user'], $pet['idPet']) && !isProposed($_SESSION['user']['idUser'], $pet['idPet'])) {?>
    <section id="adoption-propose">
      <form action="../../action/action_adopt_proposal.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="submit" value="Propose to adopt this pet!">
      </form>
    </section>
    <?php } ?>

    <?php 
      if(isOwner($_SESSION['user'], $pet['idPet'])) {
    ?>
    <section id="update">
        <p><a href=dog_update.php?idPet=<?=$pet['idPet']?>>Update Pet Info</a></p>
    </section> 
    <?php } ?>
  
    <?php } ?>

    <section id="question">
    <h2>Ask a Question</h2>
      <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { ?>
      <form action="../../action/action_add_question.php?idPet=<?=$pet['idPet']?>" method="post">
        Question: <input type="text" name="question">
        <input type="submit" value="Ask!">
      </form>
      <?php } ?>
      <?php foreach($questions as $qst) {?>
        <p><?=$qst['info']?></p>
      <?php } ?>
    </section>
    
    <section id="information">
      <h2>Informação </h2>
        <p><a href=dog_info.php?idPet=<?=$pet['idPet']?>>More Info</a></p>
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
    <section id="posts">
      <h2>Posts</h2>
      <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) && isOwner($_SESSION['user'], $pet['idPet'])) { ?>
      <form action="../../action/action_add_post.php?idPet=<?=$pet['idPet']?>" method="post">
        Question: <input type="text" name="post">
        <input type="submit" value="Post!">
      </form>
      <?php } ?>
      <?php foreach($posts as $post) {?>
        <p><?=$post['POST']?></p>
      <?php } ?>
    </section>
    <section id="proposals">
        <h1>Proposals</h1>
        <?php foreach($proposals as $prop) {?>
          <p><?=$prop['idUser']?></p>
          <?php if(isOwner($_SESSION['user'], $pet['idPet'])) { ?>
          <p><a href="../../action/action_adopt.php?idPet=<?=$pet['idPet']?>">Accept this proprosal</a></p>
        <?php } } ?>
    </section>
    <section id="found-adopted">
      <h1>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=$owner['username']?></a></h1>
      <?php if(!empty($adopted)) { ?>
        <h1>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?=$adopted['username']?></a></h1>
      <?php } else { ?>
        <h1>Not adopted yet!</h1>
      <?php } ?>
    </section>
  </div>  
</section>