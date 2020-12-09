<section id="pet-update">
    <form class="goback" action="dog_profile.php?idPet=<?=$pet['idPet']?>" method="post">
        <button type="submit">Back to Pet's page</button>
    </form>
    <section id="updatecontainers">
        <form class="updatepetinfo" action="../../action/action_update_dog.php?idPet=<?=$pet['idPet']?>" method="post">    
            <h1>Update Pet Info</h1>    
            <label>Update Name <input type="text" name="npetName" value="<?=$pet['petName']?>"></label>
            <label>Update Specie <input type="text" name="nspecie" value="<?=$pet['specie']?>"></label>
            <label>Update Gender <input type="text" name="ngender" value="<?=$pet['gender']?>"></label>
            <label>Update Size <input type="text" name="nsize" value="<?=$pet['size']?>"></label>
            <label>Update color <input type="text" name="ncolor" value="<?=$pet['color']?>"></label>
            <input type="submit" value="Update">
        </form>
        
        <div class="updateposts">
            <h1>Update Pet Posts</h1>
            <?php foreach($posts as $post) {?>
                <section id="buttonsposts">
                    <form action="../../action/action_dog_update_post.php?id=<?=$post['id']?>" method="post">
                        <label>Update Post <input type="text" name="post" value="<?=$post['POST']?>"></label>
                        <input class="column" type="submit" value="Update Post">
                    </form> 
                    <form action="../../action/action_dog_delete_post.php?id=<?=$post['id']?>" method="post">
                        <button type="submit"> Delete Post</button>
                    </form>
                </section>            
                <?php } ?>
        </div>
        
        <div class="add-photo">
            <h1>Insert Pet Photo</h1>
            <form action="../../action/action_add_pet_photo.php?idPet=<?=$pet['idPet']?>" method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <input type="submit" value="update">
            </form>
        </div>
    </section>

</section>