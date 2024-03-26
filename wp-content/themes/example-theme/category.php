<?php
global $wp_query;
get_header();
?>

    <section class="hero">
        <div class="hero-text">
          <?php
          //      echo '<h1>' . single_cat_title('', false) . '</h1>';
          echo '<h1>' . single_cat_title('', false) . '</h1>';
          echo '<p>' . category_description() . '</p>';
          ?>
        </div>
        // TODO
        <img src="<?php echo get_random_post_image(get_queried_object_id()); ?>" alt="hero">
    </section>
    <main>
        <section class="products">
            <h2><?php single_cat_title() ?></h2>
          <?php
          // query: hakee posts, tags pages, xem tag parameters
          $args = ['tag' => 'featured', 'post_per_page' => 3];
          $products = new WP_query($args);
          // generate_article($products);
          generate_article($wp_query);
          ?>
        </section>
    </main>

<?php
get_sidebar();
get_footer();
?>