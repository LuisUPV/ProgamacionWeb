<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Rocket
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function rocket_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'rocket_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function rocket_jetpack_setup
add_action( 'after_setup_theme', 'rocket_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function rocket_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function rocket_infinite_scroll_render
