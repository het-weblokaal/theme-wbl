<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Inform WordPress of custom language directory
	load_theme_textdomain( 'theme-wbl', App::path( App::get_lang_dir() ) );

	// Colors
	add_theme_support( 'editor-color-palette', [] );

	// Excerpts
	add_filter( 'excerpt_length', __NAMESPACE__ . '\excerpt_length' );

	// Body class
	add_filter( 'body_class', __NAMESPACE__ . '\add_page_image_class', 11, 2 );

	// Make sure we render the right loop template
	add_filter( 'wbl/theme/template/loop/type', __NAMESPACE__ . '\loop_type', 10, 2 );

}, 5 );

/**
 * Excerpt length
 */
function excerpt_length( $length ) {
    return 24;
}

/**
 * Add page image class
 */
function add_page_image_class( $classes ) {

	if (is_singular() && has_post_thumbnail()) {
		$classes[] = 'has-page-image';
	}

	return $classes;
}


function loop_type( $type, $post_type ) {

	$type_map = [
		'post' => 'blog',
		'wbl_project' => 'work'
	];

	$type = $type_map[$post_type] ?? $type;

	return $type;
}