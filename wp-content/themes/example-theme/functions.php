<?php
// filters
function search_filter($query) {
	if ($query->is_search) {
		$query->set('category_name', 'products');
	}
	return $query;
}
add_filter('pre_get_posts','search_filter');

function my_breadcrumb_title_swapper( $title,  $type, $id ) {
	if ( in_array( 'home', $type ) ) {
		$title = __( 'Home' );
	}

	return $title;
}
add_filter( 'bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10 );


function theme_setup(): void {
  // näkee title tag
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'custom-logo', [
    'height'      => 100,
    'width'       => 200,
    'flex-height' => true,
  ] );

  // Set the default Post Thumbnail size
  set_post_thumbnail_size( 200, 200, true ); // 200px wide by 200px high, hard crop mode

  // Add custom image sizes
  add_image_size( 'custom-header', 1200, 400, true ); // Custom header size

	// search
	add_theme_support( 'html5', array( 'search-form' ) );
}

  // Add menu
  register_nav_menu( 'main-menu', __( 'Main Menu' ) );

add_action( 'after_setup_theme', 'theme_setup' );

// Setup style
function style_setup(): void {
  wp_enqueue_style('main-style', get_stylesheet_uri());
}

add_action(hook_name: 'wp_enqueue_scripts', callback: 'style_setup');

// load javascript
function script_setup():void {
	wp_enqueue_script('single_post', get_template_directory_uri() . '/js/singlePost.js',
		[], '1.0', true);
	$script_data = [
		// ajaxin vakiona
		'ajax_url' => admin_url('admin.ajax.php'),

	];
	// tunniste wp_enqueue_script('single_post'), sen dataksi; 'singlePost'
	wp_localize_script('single_post', 'singlePost', $script_data);
};

add_action('wp_enqueue_scripts', 'script_setup');

// load style

// ulkoasu mukautaa sivuston identtitentti

// custom functions
// __DIR__ kansio tällä hetkellä
require_once (__DIR__ . '/inc/article-function.php');
require_once (__DIR__ . '/inc/random-image.php');