<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Hemingway Metro
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function hemingway_metro_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'content',
		'render'         => 'hemingway_metro_render',
		'footer_widgets' => array( 'sidebar-4', 'sidebar-2', 'sidebar-3' ),
	) );
}
add_action( 'after_setup_theme', 'hemingway_metro_jetpack_setup' );

function hemingway_metro_render() {

	while( have_posts() ) {
		the_post();
		get_template_part( 'content' );
	}
}
