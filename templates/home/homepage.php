<section id="Pet">
  <?php foreach($articles as $article) { ?>
  <article>
    <h1><?=$article['petName']?></h1>
    <p class="intro">Sed convallis libero sed euismod iaculis. Mauris ac dui eget ante pharetra semper. In posuere, orci nec hendrerit interdum, nulla felis ornare elit, in fringilla nulla orci ut turpis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec eget massa sed purus dictum aliquam vel a nulla. Curabitur sed enim ex. Aliquam id semper erat. Nulla facilisi. </p>
    <img src="http://lorempixel.com/400/200/animals" alt="">
  </article>
  <?php } ?>
</section>


