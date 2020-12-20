<?php if (isLogged()) { ?>
      <div id="my-modal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Pending Adoption Proposals</h3>
            <?php $notifications = getUserNotifications($_SESSION['user']['idUser']); ?>
            <?php foreach($notifications as $not) { ?>
              <article>
                <i class="fa fa-fw fa-paw"></i>
                <img src="./images/user/user-<?=$not['idUser']?>.jpg" width="20" height="20" alt="User">
                <span><?= htmlentities($not['username'])  ?> wants to adopt </span>
                <img src="./images/pet-profile/pet-<?=$not['idPet']?>/profile.jpg" width="20" height="20" alt="Pet">
                <span><?= htmlentities($not['petName']) ?>!</span>
                <a href="pet_profile.php?idPet=<?=$not['idPet']?>"> Go to the pet page! </a>
              </article>
            <?php } ?> 
          </div>
        </div>
<?php } ?> 