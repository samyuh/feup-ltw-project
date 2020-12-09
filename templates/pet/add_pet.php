<section id="add">
    <section id="petinfocontainer">
        <h1>Insert Pet Info</h1>
        <form class="inputsNewPet" action="../../action/action_add_pet.php" method="post" enctype="multipart/form-data">
            <label>Update Name <input type="text" name="npetName"></label>
            <label>Update Specie <input type="text" name="nspecie"></label>
            <label>Update Gender <input type="text" name="ngender"></label>
            <label>Update Size <input type="text" name="nsize" ></label>
            <label>Update color <input type="text" name="ncolor"></label>
            <input type="file" name="image">
            <input type="submit" value="update">
        </form>
    </section>
</section>