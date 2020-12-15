<div id="add-pet">
    <section id="add-pet-container">   
        <h1>Insert Pet Info</h1>
        <form class="form-new-pet" id="addPetForm" action="../../action/action_add_pet.php?token=<?=$_SESSION['csrf']?>" method="post" enctype="multipart/form-data">
            <input type="text" name="npetName" placeholder="Name">
            Species:
            <section class="options">
                <label>Dog <input type="radio" name="nspecie" value="dog" checked="checked"></label>
                <label>Cat <input type="radio" name="nspecie" value="cat"></label>
            </section>
            
            Biography:
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
            <input type="text" name="ncolor" placeholder="Update color">
            <input type="file" name="image"  accept="image/*" onchange="loadFile(event)">>
            <img id="output" src="#" style="max-height:15em; max-width:15em;" alt="Image Preview" />
            <input type="submit" id="addPetButton" value="Update">
        </form>
    </section>
</div>

<!--- Clean this --->
<script>
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src) 
    }
};
</script>
<!--- Clean this --->


