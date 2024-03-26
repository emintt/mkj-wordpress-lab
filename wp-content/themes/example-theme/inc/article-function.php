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
          the_post_thumbnail();
          the_title(before: '<h3>', after: '</h3>');
          $excerpt = get_the_excerpt();
          ?>
          <p>
            <?php
              echo substr($excerpt, 0, 100);
              ?>
          </p>
        </article>
    <?php
    endwhile;
  else :
    _e('Sorry, no posts matched your criteria.', 'esimerkki');
  endif;
}