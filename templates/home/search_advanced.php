<section id="advanced_search_page">
  <aside id="side">
    <fieldset id="advanced_search">
          <h2>Advanced search</h2>
          <form id="name_search" action="/search.php" method="post">
            Insert Name: 
              <input type="text" name="nameSearch" id="searchName">
            Insert Species:
            <section id="species_options">
              <label>Dog <input type="radio" name="speciesSearch" id="searchSpecies" value="dog"></label>
              <label>Cat <input type="radio" name="speciesSearch" id="searchSpecies"value="cat"></label>
              <label>Any <input type="radio" name="speciesSearch" id="searchSpecies"value="" checked="checked"></label>
            </section>
            Insert Gender:
            <section id="species_options">
              <label>Male <input type="radio" name="genderSearch" id="searchGender" value="male"></label>
              <label>Female <input type="radio" name="genderSearch" id="searchGender" value="female"></label>
              <label>Any <input type="radio" name="genderSearch" id="searchGender"value=""  checked="checked"></label>
              </section>
            Insert Size:
            <section id="size_options">
              <label>Small <input type="radio" name="sizeSearch" id="searchSize" value="small"></label>
              <label>Medium <input type="radio" name="sizeSearch" id="searchSize" value="medium"></label>
              <label>Large <input type="radio" name="sizeSearch" id="searchSize" value="large"></label>
              <label>Any <input type="radio" name="sizeSearch" id="searchSize" value=""  checked="checked"></label>
            </section>
            Insert Color 
              <input type="text" name="colorSearch" id="searchSize">
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


