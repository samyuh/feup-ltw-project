<section id="pet">
  <div class="profileHeader">
    <div class="header">
    </div>
    <div class="image">
    <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200" alt="Pet profile pic">
    </div>
    

    <div class="name_and_favorite">
      <h1><?=$pet['petName']?></h1>
      <?php
      if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
      $star = isFavorited($_SESSION['user'], $pet['idPet']) ? "fa fa-star-o" : "fa fa-star";  
      ?>
      <section id="favorite">
        <form id="favoriteForm" action="../../action/action_favorite.php?idPet=<?=$pet['idPet']?>" method="post">
          <button id="favoriteFormButton" title="Favorite Pet" type="submit"class="<?=$star?>" value="<?=$pet['idPet']?>"></button>
        </form>
      </section>
      <?php } ?>
    </div>
  </div>
  <section id="profile">
    <div class="infoGrid">

      <section id="information_pet">
        <section id="information_and_update">
          <h2>Information</h2>
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
          <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=empty($owner['username']) ? 'Deleted User' : $owner['username']?></a></p>
            <?php if(!empty($adopted)) { ?>
                <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?= empty($adopted['username']) ? 'Deleted User' : $adopted['username'] ?></a></p>
            <?php } else { ?>
                <p>Not adopted yet!</p>
            <?php } ?>
      </section>

      <section id="question">
        <h2>Ask a Question</h2>
        <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { ?>
        <form id='questionForm' class="questionform" action="../../action/action_add_question.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
          <input type="text" name="question">
          <input type="hidden" name="idPet" value="<?=$pet['idPet']?>">
          <input id="questionFormButton" type="submit" value="Ask">
        </form>
        <section id="qs">
          
        </section>
        <?php } ?>

      </section>

      <section id="proposals">
      <h2>Adoption Proposals</h2>
          <?php foreach($proposals as $prop) {?>
            <section id="uniqueproposal">
              <img src="../images/user/user-<?=$prop['idUser']?>.jpg" width="20" height="20" alt="">
              <p><?=$prop['username']?></p>
              <?php if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) { 
              if(isOwner($_SESSION['user'], $pet['idPet'])) { ?>
              <form action="../../action/action_adopt.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
                <button type="submit"><i class="fa fa-check"></i> Accept Proposal</button>
              </form>
            </section>
          <?php } } } ?>
          <?php  
          if (!(!array_key_exists('user', $_SESSION) || empty($_SESSION['user']))) {
            if(!isAdopted($pet['idPet']) && !isOwner($_SESSION['user'], $pet['idPet']) && !isProposed($_SESSION['user']['idUser'], $pet['idPet'])) {?>
          <section id="adoption-propose">
            <form action="../../action/action_adopt_proposal.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
              <input type="submit" value="Propose to adopt this pet!">
            </form>
          </section>
          <?php } } ?>
      </section>
    </div>  
  </section>
</section>