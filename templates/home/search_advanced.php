<section id="advanced_search_page">
  <aside id="side">
    <fieldset id="advanced_search">
          <h2>Advanced search</h2>
          <form id="name_search" action="/search.php" method="post">
            <p>Insert Name: 
              <input type="text" name="nameSearch" id="searchName">
            </p>
            <p>Insert Species:
              <br>
              <input type="radio" name="speciesSearch" id="searchSpecies" value="dog"> Dog
              <input type="radio" name="speciesSearch" id="searchSpecies"value="cat"> Cat
              <input type="radio" name="speciesSearch" id="searchSpecies"value=""  checked="checked"> Any
            </p>
            <p>Insert Gender:
              <br>
              <input type="radio" name="genderSearch" id="searchGender" value="male"> Male
              <input type="radio" name="genderSearch" id="searchGender" value="female"> Female
              <input type="radio" name="genderSearch" id="searchGender"value=""  checked="checked"> Any
            </p>
            <p>Insert Size:
              <br>
              <input type="radio" name="sizeSearch" id="searchSize" value="small"> Small
              <input type="radio" name="sizeSearch" id="searchSize" value="medium"> Medium
              <input type="radio" name="sizeSearch" id="searchSize" value="large"> Large
              <input type="radio" name="sizeSearch" id="searchSize" value=""  checked="checked"> Any
            </p>
            <p>Insert Color 
              <input type="text" name="colorSearch" id="searchSize">
            </p>
          </form>
    </fieldset>
    </aside>

  <section id="displayPets">
    <article>
      <div class="profileGrid">
      </div>
    </article>
  </section>
</section>


