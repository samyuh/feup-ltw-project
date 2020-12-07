<section id="update">
<h1>Update Pet Info</h1>
<form action="../../action/action_update_dog.php?idPet=<?=$pet['idPet']?>" method="post">
    <label>Update Name <input type="text" name="npetName" value="<?=$pet['petName']?>"></label>
    <label>Update Specie <input type="text" name="nspecie" value="<?=$pet['specie']?>"></label>
    <label>Update Gender <input type="text" name="ngender" value="<?=$pet['gender']?>"></label>
    <label>Update Size <input type="text" name="nsize" value="<?=$pet['size']?>"></label>
    <label>Update color <input type="text" name="ncolor" value="<?=$pet['color']?>"></label>
    <input type="submit" value="update">
</form>
<h1>Update Pet Posts</h1>
<?php foreach($posts as $post) {?>
        <form action="action_dog_update_post.php?id=<?=$post['id']?>" method="post">
            <label>Update Name <input type="text" name="post" value="<?=$post['POST']?>"></label>
            <input type="submit" value="Update Post">
        </form>
        <p><a href=../../action/action_dog_delete_post.php?id=<?=$post['id']?>>Delete Post</a></p>
      <?php } ?>
</section>

<p><a href=dog_profile.php?idPet=<?=$pet['idPet']?>?>>Back to Pet page</a></p>