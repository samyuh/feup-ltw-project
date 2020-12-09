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

    <div class="name_and_favorite">
      <h1><?=$pet['petName']?></h1>
      <?php
      if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
        if(isFavorited($_SESSION['user'], $pet['idPet'])) {
      ?>
      <section id="favorite">
        <form action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
          <button title="Favorite Pet" type="submit"><i class="fa fa-star-o"></i></button>
        </form>
      </section>
      <?php } else {?>
      <section id="remove">
        <form action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
        <button title="Unfavorite Pet"type="submit"><i class="fa fa-star"></i></button>
        </form>
      </section>
      <?php } } ?>
    </div>
  </div>
  <div class="infoGrid">

    <section id="information_pet">
      <section id="information_and_update">
        <h2>Information</h2>
        <?php 
        if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
          if(isOwner($_SESSION['user'], $pet['idPet'])) {
        ?>
        <form action="dog_update.php?idPet=<?=$pet['idPet']?>" method="post">
          <button type="submit"><i class="fa fa-pencil"></i></button>
        </form>
        <?php } } ?>
        <section id="moreinfo">
          <form action="dog_info.php?idPet=<?=$pet['idPet']?>" method="post">
            <button type="submit"><i class="fa fa-plus"></i></button>
          </form>
        </section>
      </section>
        <p>Species: <?=$pet['specie']?></p>
        <p>Gender: <?=$pet['gender']?></p>
        <p>Size: <?=$pet['size']?></p>
        <p>Color: <?=$pet['color']?></p>
        <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=$owner['username']?></a></p>
      <?php if(!empty($adopted)) { ?>
        <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?=$adopted['username']?></a></p>
      <?php } else { ?>
        <p>Not adopted yet!</p>
      <?php } ?>
    </section>

    

    <section id="posts">
      <h2>Posts</h2>
      <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user'])) && isOwner($_SESSION['user'], $pet['idPet'])) { ?>
      <form class="postsform" action="../../action/action_add_post.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="text" name="post">
        <input type="submit" value="Post">
      </form>
      <?php } ?>
      <?php foreach($posts as $post) {?>
        <section id="uniquepost"/>
          <p><?=$post['POST']?></p>
        </section>
      <?php } ?>
    </section>

    <section id="question">
      <h2>Ask a Question</h2>
      <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { ?>
      <form class="questionform" action="../../action/action_add_question.php?idPet=<?=$pet['idPet']?>" method="post">
        <input type="text" name="question">
        <input type="submit" value="Ask">
      </form>
      <?php } ?>
      <?php foreach($questions as $qst) {?>
        <section id="uniquequestion">
          <p><?=$qst['info']?></p>
        </section>
      <?php } ?>
    </section>

    <section id="proposals">
    <h2>Adoption Proposals</h2>
        <?php foreach($proposals as $prop) {?>
          <section id="uniqueproposal">
            <p><?=$prop['idUser']?></p>
            <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { 
            if(isOwner($_SESSION['user'], $pet['idPet'])) { ?>
            <form action="../../action/action_adopt.php?idPet=<?=$pet['idPet']?>" method="post">
              <button type="submit"><i class="fa fa-check"></i> Accept Proposal</button>
            </form>
          </section>
        <?php } } } ?>
        <?php  
        if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
          if(!isAdopted($pet['idPet']) && !isOwner($_SESSION['user'], $pet['idPet']) && !isProposed($_SESSION['user']['idUser'], $pet['idPet'])) {?>
        <section id="adoption-propose">
          <form action="../../action/action_adopt_proposal.php?idPet=<?=$pet['idPet']?>" method="post">
            <input type="submit" value="Propose to adopt this pet!">
          </form>
        </section>
        <?php } } ?>
    </section>
  </div>  
</section>