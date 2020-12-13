<section id="add">
   
    <section id="petinfocontainer">   
        <h1>Insert Pet Info</h1>
        <form class="inputsNewPet" id="addPetForm" action="../../action/action_add_pet.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
            <input type="text" name="npetName" placeholder="Update Name">
            Species:
            <section id="species_options">
                <label>Dog <input class="hide" type="radio" name="nspecie" value="dog" checked="checked"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
                <label>Cat <input class="hide" type="radio" name="nspecie" value="cat"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
            </section>
            Gender:
            <section id="gender_options">
                <label>Male <input class="hide" type="radio" name="ngender" value="male" checked="checked"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
                <label>Female <input class="hide" type="radio" name="ngender" value=female><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
            </section>
            Size:
            <section id="size_options">
                <label>Small <input class="hide" type="radio" name="nsize" value="small"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
                <label>Medium<input class="hide"type="radio" name="nsize" value="medium" checked="checked"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
                <label>Large<input class="hide"type="radio" name="nsize" value="large"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
            </section>
            <input type="text" name="ncolor" placeholder="Update color">
            <input type="file" name="image">
            <input type="submit" id="addPetButton" value="Update">
        </form>
    </section>
</section>


