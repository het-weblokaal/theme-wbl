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
	load_theme_textdomain( 'theme-wbl', Theme::get_file_path( Theme::get_lang_dir() ) );

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

}, 5 );