<section id="add">
   
    <section id="petinfocontainer">   
        <h1>Insert Pet Info</h1>
        <form class="inputsNewPet" id="addPetForm" action="../../action/action_add_pet.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
            <input type="text" name="npetName" placeholder="Update Name">
            Species:
            <label>Dog <input type="radio" name="nspecie" value="dog" checked="checked"></label>
            <label>Cat <input type="radio" name="nspecie" value="cat"></label>
            Gender:
            <label>Male <input type="radio" name="ngender" value="male" checked="checked"></label>
            <label>Female <input type="radio" name="ngender" value=female></label>
            Size:
            <label>Small <input type="radio" name="nsize" value="small"></label>
            <label>Medium<input type="radio" name="nsize" value="medium" checked="checked"></label>
            <label>Large<input type="radio" name="nsize" value="large"></label>
            <input type="text" name="ncolor" placeholder="Update color">
            <input type="file" name="image">
            <input type="submit" id="addPetButton" value="update">
        </form>
    </section>
</section>


