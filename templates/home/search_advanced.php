<section id="advanced_search_page">
  <aside id="side">
    <fieldset id="advanced_search">
          <h2>Advanced search</h2>
          <form id="name_search" action="/search.php" method="post">
            Insert Name: 
              <input type="text" name="nameSearch" id="searchName">
            Insert Species:
            <section id="species_options">
              <label>Dog <input class="hide" type="radio" name="speciesSearch" id="searchSpecies" value="dog"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
              <label>Cat <input class="hide" type="radio" name="speciesSearch" id="searchSpecies"value="cat"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
              <label>Any <input class="hide" type="radio" name="speciesSearch" id="searchSpecies"value="" checked="checked"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
            </section>
            Insert Gender:
            <section id="species_options">
              <label>Male <input class="hide" type="radio" name="genderSearch" id="searchGender" value="male"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
              <label>Female <input class="hide" type="radio" name="genderSearch" id="searchGender" value="female"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
              <label>Any <input class="hide" type="radio" name="genderSearch" id="searchGender"value=""  checked="checked"><i class="fa fa-fw fa-genderless"></i>&nbsp;</label>
              </section>
            Insert Size:
            <section id="size_options">
              <label>Small <input class="hide" type="radio" name="sizeSearch" id="searchSize" value="small"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
              <label>Medium <input class="hide" type="radio" name="sizeSearch" id="searchSize" value="medium"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
              <label>Large <input class="hide" type="radio" name="sizeSearch" id="searchSize" value="large"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
              <label>Any <input class="hide" type="radio" name="sizeSearch" id="searchSize" value=""  checked="checked"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
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


