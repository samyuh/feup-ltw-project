<fieldset id="advanced_search">
    <legend>Avanced search</legend>
      
      <form id="name_search" action="/search.php" method="post">
        <p>Insert Name: 
          <input type="text" name="nameSearch" id="searchName">
        </p>
        <p>Insert Species:
          <input type="radio" name="speciesSearch" id="searchSpecies" value="dog" checked="checked"> Dog
          <input type="radio" name="speciesSearch" id="searchSpecies"value="cat"> Cat
          <input type="radio" name="speciesSearch" id="searchSpecies"value=""> Any
        </p>
        <p>Insert Gender:
          <input type="radio" name="genderSearch" id="searchGender" value="male" checked="checked"> Male
          <input type="radio" name="genderSearch" id="searchGender" value="female"> Female
          <input type="radio" name="genderSearch" id="searchGender"value=""> Any
        </p>
        <p>Insert Size:
          <input type="radio" name="sizeSearch" id="searchSize" value="small"> Small
          <input type="radio" name="sizeSearch" id="searchSize" value="medium" checked="checked"> Medium
          <input type="radio" name="sizeSearch" id="searchSize" value="large"> Large
          <input type="radio" name="sizeSearch" id="searchSize" value=""> Any
        </p>
        <p>Insert Color 
          <input type="text" name="colorSearch" id="searchSize">
        </p>
      </form>
  

</fieldset>


