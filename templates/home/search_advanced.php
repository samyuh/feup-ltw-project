<div id="advanced-search-page">
    <section id="advanced-search">
      <h2>Advanced search</h2>
        <form id="name_search" action="/search.php" method="post">
          <label>Insert Name: <input type="text" name="nameSearch" id="searchName"></label>
          <section class="options">
            Insert Species:
            <label>Dog <input class="hide" type="radio" name="speciesSearch" value="dog"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
            <label>Cat <input class="hide" type="radio" name="speciesSearch" value="cat"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
            <label>Any <input class="hide" type="radio" name="speciesSearch" value="" checked="checked"><i class="fa fa-fw fa-paw"></i>&nbsp;</label>
          </section>
          <section class="options">
            Insert Gender:
            <label>Male <input class="hide" type="radio" name="genderSearch" value="male"><i class="fa fa-fw fa-mars"></i>&nbsp;</label>
            <label>Female <input class="hide" type="radio" name="genderSearch" value="female"><i class="fa fa-fw fa-venus"></i>&nbsp;</label>
            <label>Any <input class="hide" type="radio" name="genderSearch" value=""  checked="checked"><i class="fa fa-fw fa-genderless"></i>&nbsp;</label>
            </section>
          <section class="options">
            Insert Size:
            <label>Small <input class="hide" type="radio" name="sizeSearch" value="small"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
            <label>Medium <input class="hide" type="radio" name="sizeSearch" value="medium"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
            <label>Large <input class="hide" type="radio" name="sizeSearch" value="large"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
            <label>Any <input class="hide" type="radio" name="sizeSearch" value=""  checked="checked"><i class="fa fa-fw fa-check-circle"></i>&nbsp;</label>
          </section>
          <label>Insert Color <input type="text" name="colorSearch" id="searchSize"></label>
        </form>
  </section>

  <div id="search-pet-profile">
  </div>
</div>


