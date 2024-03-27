<?php

function get_random_post_image($category_id): string
{
  $args = array(
    'post_type' => 'post',
    'cat' => $category_id,
    'posts_per_page' => 1,
    'order by' => 'rand',
  );
  $random_post = new WP_Query($args);
  if ($random_post->have_posts()):
    while ($random_post->have_posts()):
      $random_post->the_post();
      $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id());
      if ($featured_image_url) {
        return $featured_image_url;
      }
    endwhile;
  endif;
  // tyhjentä haun
  wp_reset_postdata();
  return '';
}