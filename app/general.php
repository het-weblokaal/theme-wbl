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
	load_theme_textdomain( 'theme-wbl', App::get_file_path( App::get_lang_dir() ) );

	// Colors
	add_theme_support( 'editor-color-palette', [
		[
			'name' => __( 'Primary Color', 'theme-wbl' ),
			'slug' => 'primary-1',
			'color' => '#FFF7D6' //'#fff5cc',
		],
		[
			'name' => __( 'Secondary Color', 'theme-wbl' ),
			'slug' => 'secondary-1',
			'color' => '#000000',
		]
	] );


	// Excerpts
	add_filter( 'excerpt_length', __NAMESPACE__ . '\excerpt_length' );

	add_filter( 'body_class', __NAMESPACE__ . '\add_page_image_class', 11, 2 );

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

	App::log('add_page_image_class');

	if (is_singular() && has_post_thumbnail()) {
		App::log('add_page_image_class 2222222');
		$classes[] = 'has-page-image';
	}

	return $classes;
}