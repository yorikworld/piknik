<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package philips
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function philips_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'philips_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function philips_jetpack_setup
add_action( 'after_setup_theme', 'philips_jetpack_setup' );

function philips_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function philips_infinite_scroll_render