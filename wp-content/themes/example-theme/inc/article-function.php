<?php

function generate_article($products): void
{
  // tulosta haun tulokset, esim haku productsin sisällön
  if ($products->have_posts()) :
    while ($products->have_posts()) :
      $products->the_post();
      ?>
        <article class="product">
          <?php
          the_title(before: '<h1>', after: '</h1>');
          the_content();
          ?>
        </article>
    <?php
    endwhile;
  else :
    _e('Sorry, no posts matched your criteria.', 'esimerkki');
  endif;
}