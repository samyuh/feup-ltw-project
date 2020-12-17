<div id="pet">
  <div class="profile-header">
    <section class="profile-image">
      <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200" alt="Pet profile pic">
    </section>
    
    <section class="profile-text">
      <h1><?=$pet['petName']?></h1>
      <?php if (isLogged()) {
        $star = isFavorited($_SESSION['user'], $pet['idPet']) ? "fa fa-star-o" : "fa fa-star";  
      ?>
        <section id="favorite">
          <form id="favorite-form" action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
            <button id="favorite-form-button" title="Favorite Pet" type="submit" class="<?=$star?>" value="<?=$pet['idPet']?>"></button>
          </form>
        </section>
      <?php } ?>
    </section>
  </div>

  <div id="profile-grid">
      <section id="information-profile">
        <section id="information-profile-header">
          <h2>Information</h2>

          <aside id="information-profile-more">
            <form action="pet_info.php?idPet=<?=$pet['idPet']?>" method="post">
              <button type="submit"><i class="fa fa-plus"></i></button>
            </form>
          </aside>
        </section>
          <p>Species: <?= htmlentities($pet['specie']) ?></p>
          <p>Gender: <?= htmlentities($pet['gender']) ?></p>
          <p>Size: <?= htmlentities($pet['size']) ?></p>
          <p>Color: <?= htmlentities($pet['color']) ?></p>
          <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=empty($owner['username']) ? 'Deleted User' : htmlentities($owner['username']) ?></a></p>
            <?php if(!empty($adopted)) { ?>
                <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?= htmlentities($adopted['username']) ?></a></p>
            <?php } else { ?>
                <p>Not adopted yet!</p>
            <?php } ?>
      </section>

      <section id="question">
        <h2>Ask a Question</h2>
        <?php if (isLogged()) { ?>
          <form id='question-form' action="../../action/action_add_question.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
            <input type="text" name="question">
            <input type="hidden" id="idPet-question" name="idPet" value="<?= htmlentities($pet['idPet']) ?>">
            <input type="hidden" id="idUser-question" name="idUser" value="<?= htmlentities($_SESSION['user']['idUser']) ?>">
            <input type="hidden" id="owner-question" name="owner" value="<?= htmlentities($owner['idUser']) ?>">
            <input id="question-form-button" type="submit" value="Ask">
          </form>
          
          <section id="question-submit">
            
          </section>
        <?php } else { ?>
          <p>Please login or create an account to ask and see all questions made to this pet!</p>

        <?php } ?>
      </section>

      <section id="proposals">
        <h2>Adoption Proposals</h2>
        <?php if(isAdopted($pet['idPet'])) {?>
          <p> This pet is already adopted! </p>
        <?php } else {?>
        <?php foreach($proposals as $prop) {?>
          <article class="unique-proposal">
            <img src="../images/user/user-<?=$prop['idUser']?>.jpg" width="45" height="45" alt="">
            <p><?= htmlentities($prop['username']) ?></p>
            <?php if (isLogged() && isOwner($_SESSION['user'], $pet['idPet'])) { ?>
              <form action="../../action/action_adopt.php?idPet=<?=$pet['idPet']?>&idUser=<?=$prop['idUser']?>&token=<?=$_SESSION['csrf']?>" method="post">
                <button type="submit"><i class="fa fa-check"></i> Accept Proposal</button>
              </form>
            <?php } ?>
          </article>
        <?php } ?>
        <?php  
        if (isLogged()) {
          if(!isAdopted($pet['idPet']) && !isOwner($_SESSION['user'], $pet['idPet']) && !isProposed($_SESSION['user']['idUser'], $pet['idPet'])) {?>
          <section id="adoption-proposal">
            <form action="../../action/action_adopt_proposal.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
              <input type="submit" value="Propose to adopt this pet!">
            </form>
          </section>
        <?php } } } ?>
      </section>
    </div>  
</div>