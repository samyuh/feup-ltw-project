<div>
    <section>
        <img src="../images/pet-profile/pet-<?=$pet['idPet']?>/profile.jpg" width="200" height="200">
        <h1><a href=dog_profile.php?idPet=<?=$pet['idPet']?>><?=$pet['petName']?></a></h1>
        <h2>Contacts</h2>
    </section>

    <article>
        <h1>Information</h1>
        <ul>
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
        </ul>


        <?php foreach($photos as $photo) {?>
            <img src="../../images/pet-profile/pet-<?=$pet['idPet']?>/photo-<?=$photo['idPhoto']?>.jpg" alt="Failed displaying dog image" width="100" height="100">
        <?php } ?>
        <aside>
            <p><?=$pet['bio']?></p>   
        </aside>

    </article>

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

</div>
    
