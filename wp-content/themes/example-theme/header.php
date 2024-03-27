<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body>
<div class="container">
    <header class="page-header">
        <div class="header-top-left">
					<?php the_custom_logo(); ?>
            <!-- <img src="//placehold.it/200x100?text=Logo" alt="Logo"> -->
        </div>
        <div class="header-top-right">
					<?php wp_nav_menu( [ 'container' => 'nav', 'theme_location' => 'main-menu' ] ) ?>
            <!-- <nav>
			  <ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">About us</a></li>
			  </ul>
			</nav> -->
        </div>
    </header>
    <section>
			<?php if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			} ?>
    </section>