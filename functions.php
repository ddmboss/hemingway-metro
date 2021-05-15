<?php
/**
 * Hemingway Metro functions and definitions
 *
 * @package Hemingway Metro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 676; /* pixels */
}

if ( ! function_exists( 'hemingway_metro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hemingway_metro_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Hemingway Metro, use a find and replace
	 * to change 'hemingway-metro' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hemingway-metro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'hemingway-metro-header', '1280', '416', true );
    add_image_size( 'hemingway-metro-slider', '1040', '446', true );
	add_image_size( 'hemingway-metro-featured', '676', '290', true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hemingway-metro' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hemingway_metro_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // hemingway_metro_setup
add_action( 'after_setup_theme', 'hemingway_metro_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function hemingway_metro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hemingway-metro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'hemingway-metro' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'hemingway-metro' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'hemingway-metro' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'hemingway_metro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hemingway_metro_scripts() {
	wp_enqueue_style( 'hemingway-metro-raleway' );
	wp_enqueue_style( 'hemingway-metro-latos' );
    wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/inc/slider/css/flexslider.css' );
	wp_enqueue_style( 'hemingway-metro-style', get_stylesheet_uri() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'hemingway-metro-script', get_template_directory_uri() . '/js/hemingway-metro.js', array( 'jquery' ), '20140228', true );
    wp_enqueue_script( 'flexslider-script', get_template_directory_uri() .  '/inc/slider/js/jquery.flexslider-min.js', array( 'jquery' ), 'null', true );
    wp_enqueue_script( 'flexslider-init', get_template_directory_uri() .  '/inc/slider/js/flexslider-init.js', array( 'jquery' ), 'null', true );
	wp_enqueue_script( 'hemingway-metro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'hemingway-metro-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hemingway_metro_scripts' );

/**
 * Register Google Fonts
 */
function hemingway_metro_google_fonts() {

	$protocol = is_ssl() ? 'https' : 'http';

	/*	translators: If there are characters in your language that are not supported
		by Raleway, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'hemingway-metro' ) ) {

		wp_register_style( 'hemingway-metro-raleway', "$protocol://fonts.googleapis.com/css?family=Raleway:400,300,700" );

	}

	/*	translators: If there are characters in your language that are not supported
		by Latos, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Latos font: on or off', 'hemingway-metro' ) ) {

		wp_register_style( 'hemingway-metro-latos', "$protocol://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" );

	}

}
add_action( 'init', 'hemingway_metro_google_fonts' );

/**
 * Enqueue Google Fonts for custom headers
 */
function hemingway_metro_admin_scripts( $hook_suffix ) {

	if ( 'appearance_page_custom-header' != $hook_suffix )
		return;

	wp_enqueue_style( 'hemingway-metro-raleway' );
	wp_enqueue_style( 'hemingway-metro-latos' );

}
add_action( 'admin_enqueue_scripts', 'hemingway_metro_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Create Slider Post Type
 */
require( get_stylesheet_directory() . '/inc/slider/slider_post_type.php' );

/**
 * Create Slider
 */
require( get_stylesheet_directory() . '/inc/slider/slider.php' );

/**
 * Adds "Read more link" for custom & automatic excerpts
 */
function hemingway_metro_read_more_link($output) {
    global $post;
    return $output . "<p><a class='more-link' href='". get_permalink() ."'>Continue reading <span class='meta-nav'>&rarr;</span></a></p>";
}

add_filter('the_excerpt', 'hemingway_metro_read_more_link');

/**
 * Removes the "[]" in automatic excerpts
 */
function hemingway_metro_excerpt_more( $more ) {
    return '…';
}
add_filter('excerpt_more', 'hemingway_metro_excerpt_more');
