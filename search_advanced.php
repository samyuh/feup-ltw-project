<fieldset id="advanced_search">
    <legend>Avanced search</legend>

    <div id="name_search">
        
        <form action="/search.php" method="post">
          <p>Insert Name: 
            <input type="text" name="nameSearch">
          </p>
          <p>Insert Species:
            <input type="radio" name="speciesSearch" value="dog"> Dog
            <input type="radio" name="speciesSearch" value="cat"> Cat
          </p>
          <p>Insert Gender:
            <input type="radio" name="genderSearch" value="male"> Male
            <input type="radio" name="genderSearch" value="female"> Female
          </p>
          <p>Insert Size:
            <input type="radio" name="sizeSearch" value="small"> Small
            <input type="radio" name="sizeSearch" value="medium"> Medium
            <input type="radio" name="sizeSearch" value="large"> Large
          </p>
          <p>Insert Color 
            <input type="text" name="colorSearch">
          </p>
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

</fieldset>


