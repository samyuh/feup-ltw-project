<div id="add-pet">
    <section id="add-pet-container">   
        <h1>Insert Pet Info</h1>
        <form id="form-new-pet" action="./action/action_add_pet.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
            
            <aside id="addPet-petName-error"></aside>
            <input type="text" name="npetName" placeholder="Name">
            Species:
            <section class="options">
                <label>Dog <input type="radio" name="nspecie" value="dog" checked="checked"></label>
                <label>Cat <input type="radio" name="nspecie" value="cat"></label>
            </section>
            
            Biography:
            <aside id="addPet-bio-error"></aside>
            <input type="text" name="bio" placeholder="Pet biography">

            Gender:
            <section class="options">
                <label>Male <input type="radio" name="ngender" value="male" checked="checked"></label>
                <label>Female <input type="radio" name="ngender" value=female></label>
            </section>
            Size:
            <section class="options">
                <label>Small <input type="radio" name="nsize" value="small"></label>
                <label>Medium<input type="radio" name="nsize" value="medium" checked="checked"></label>
                <label>Large<input type="radio" name="nsize" value="large"></label>
            </section>
            <aside id="addPet-color-error"></aside>
            <input type="text" name="ncolor" placeholder="Update color">

            <aside id="addPet-file-error"></aside>
            <input type="file" name="image"  accept="image/*" onchange="loadFile(event)">>
            <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Image Preview" />
            <input type="submit" id="add-pet-button" value="Update">
        </form>
    </section>
</div>


