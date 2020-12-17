<aside class="update-back-profile-button">
        <form action="pet_info.php?idPet=<?=$pet['idPet']?>" method="post">
            <button type="submit">Back to Pet's page</button>
        </form>
</aside>

<section id="update-page">
        <article class="update-form">
        <h1>Update Pet Profile Photo</h1>   
            <form class="update-pet-info" action="../../action/action_update_pet_photo.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">    
                <input type="file" name="image" accept="image/*" onchange="loadFile2(event)">>
                    <img id="output2" src="#" style="max-height:15em; max-width:15em;" alt="Submit Photo"/>
                <input type="submit" value="Update">
            </form>
        </article>

        <article class="update-form">
            <h1>Insert Pet Album Photo</h1>
            <form action="../../action/action_add_pet_photo.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
                <input type="file" name="image-album" accept="image/*" onchange="loadFile(event)">>
                    <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Submit Photo"/>
                <input type="submit" value="Update">
            </form>
        </article>

        <article class="update-form">
                <h1>Delete Pet Album Photo</h1>
                <?php foreach($photos as $photo) {?>
                    <section id="buttons-photos">
                        <form class="delete-pet-photo-album" action="../../action/action_delete_pet_photo.php?idPhoto=<?=$photo['idPhoto']?>&token=<?=$_SESSION['csrf']?>" method="post">
                            <img src="../../images/pet-profile/pet-<?=$pet['idPet']?>/photo-<?=$photo['idPhoto']?>.jpg" alt="Pet Image" width="100" height="100">
                            <input type="submit" value="Delete Photo">
                        </form>
                    </section>            
                    <?php } ?>
        </article>

        <article class="update-form">
        <h1>Update Pet Info</h1>  
            <form class="update-pet-info" action="../../action/action_update_pet.php?idPet=<?=$pet['idPet']?>&token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">      
                <label>Update Name <input type="text" name="npetName" value="<?= htmlentities($pet['petName']) ?>"></label>
                <section class="options">
                    Update Species:
                    <label>Dog <input class="hide" type="radio" name="speciesSearch" value="dog"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
                    <label>Cat <input class="hide" type="radio" name="speciesSearch" value="cat"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
                </section>
                <section class="options">
                    Update Gender:
                    <label>Male <input class="hide" type="radio" name="genderSearch" value="male"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
                    <label>Female <input class="hide" type="radio" name="genderSearch" value="female"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
                </section>
                <section class="options">
                    Update Size:
                    <label>Small <input class="hide" type="radio" name="sizeSearch" value="small"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
                    <label>Medium <input class="hide" type="radio" name="sizeSearch" value="medium"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
                    <label>Large <input class="hide" type="radio" name="sizeSearch" value="large"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
                </section>
                <label>Update color <input type="text" name="ncolor" value="<?= htmlentities($pet['color']) ?>"></label>
                <input type="submit" value="Update">
            </form>
        </article>
        
        <article class="update-form">
            <h1>Update Pet Posts</h1>
            <?php foreach($posts as $post) {?>
                <div class="update-post">
                    <form action="../../action/action_pet_update_post.php?id=<?=$post['id']?>&token=<?=$_SESSION['csrf']?>" method="post">
                        <label>Update Post <input type="text" name="post" value="<?= htmlentities($post['post']) ?>"></label>
                        <input type="submit" value="Update Post">
                    </form> 
                    <form action="../../action/action_pet_delete_post.php?id=<?=$post['id']?>" method="post">
                        <button type="submit"> Delete Post</button>
                    </form>
                </div>            
                <?php } ?>
        </article>
</section>

<!--- Clean this --->
<script>
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) 
    }
    };

    var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) 
    }
    };
</script>
<!--- Clean this --->