<div id="pet-information">
  <aside id="pet-information-sidebar">
      <aside id="pet-name-photo">
          <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200" alt="Pet Profile Picture">
          <h1><a href="dog_profile.php?idPet=<?=$pet['idPet']?>"><?= htmlentities($pet['petName']) ?></a></h1>
          <?php if (isLogged() && isOwner($_SESSION['user'], $pet['idPet'])) {?>
            <form action="dog_update.php?idPet=<?=$pet['idPet'] ?>" method="post">
              <button type="submit"><i class="fa fa-pencil"></i></button>
            </form>
          <?php } ?>
      </aside>

      <section id="pet-detailed-information">
          <h3>Information</h3>
          <p>Species: <?= htmlentities($pet['specie']) ?></p>
          <p>Gender: <?= htmlentities($pet['gender']) ?></p>
          <p>Size: <?= htmlentities($pet['size']) ?></p>
          <p>Color: <?= htmlentities($pet['color']) ?></p>
          <p>Found by:<a href="profile.php?user=<?=$owner['username']?>"><?=empty($owner['username']) ? 'Deleted User' : htmlentities($owner['username'])?></a></p>
          <?php if(!empty($adopted)) { ?>
              <p>Adopted by:<a href="profile.php?user=<?=$adopted['username']?>"><?=  htmlentities($adopted['username']) ?></a></p>
          <?php } else { ?>
              <p>Not adopted yet!</p>
          <?php } ?>
      </section>
    </aside>

    <section id="container">
      <section id="top-container">
        <section id="biography"> 
            <h2>Biography</h2>
            <p><?= htmlentities($pet['bio']) ?></p>   
        </section>

        <section id="photos">
          <h2>Photos</h2>
          <div class="slideshow-container">
            <?php foreach($photos as $photo) {?>
              <div class="MyPhotos">
                <img src="../../images/pet-profile/pet-<?=$pet['idPet']?>/photo-<?=$photo['idPhoto']?>.jpg" alt="Failed displaying dog image" width="400" height="400">
              </div>
            <?php } ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
        </section>
      </section>

      <section id="posts">
        <h2>Posts</h2>
          <?php if (isLogged() && isOwner($_SESSION['user'], $pet['idPet'])) { ?>
            <form class="postsform" action="../../action/action_add_post.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post">
              <input type="text" name="post">
              <input type="submit" value="Post">
            </form>
          <?php } ?>
          <section id="uniquepost">
          <?php foreach($posts as $post) {?>
              <p><?= htmlentities($post['post']) ?></p>
              <p><?= htmlentities($post['datePost']) ?></p>
              <p>By <?= htmlentities($post['author']) ?></p>
          <?php } ?>
          </section>
      </section>
    </section>
</div>

<!-- clean up -->
<script>
  var slideIndex = 1;
  if(document.getElementsByClassName("MyPhotos").length){

    showSlides(slideIndex);
  }
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("MyPhotos");

    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block"; 
  }
</script>

    
