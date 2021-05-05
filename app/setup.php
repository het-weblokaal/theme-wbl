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
	load_theme_textdomain( 'wbl', Theme::get_file_path( Theme::get_lang_dir() ) );

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

	// Add scripts and styles for block-editor
	add_action( 'enqueue_block_editor_assets', 'WBL\Theme\add_block_scripts_and_styles' );

	// Load font
	add_action( 'enqueue_block_assets', 'WBL\Theme\load_font' );

	// Global inline css ...
	add_action( 'enqueue_block_assets', 'WBL\Theme\add_global_color_inline_css' );

	// Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	/**
	 * Register block patterns
	 */

	// Setup custom category for block patterns
	// register_block_pattern_category( Theme::get_id(), [ 'label' => Theme::get_name() ], 'Theme category' );

	// Setup block patterns
	// register_block_pattern( Theme::get_id() . "/hero", require Theme::template_path( 'block-patterns/hero.php' ) );

}, 5 );


/**
 * Load font
 */
function load_font() {

	// Load font
	// wp_enqueue_style( Theme::handle('roboto-font'), wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap' ), null, Theme::get_version() );
}

/**
 * Add global color inline style
 */
function add_global_color_inline_css() {

	if ($global_color_css = get_global_color_inline_style()) {

		// Register global styles
		wp_register_style( Theme::handle('global-color'), false, array(), true, true );
		wp_add_inline_style( Theme::handle('global-color'), $global_color_css );
		wp_enqueue_style( Theme::handle('global-color') );
	}
}

/**
 * Block assets for the block editor
 */
function add_block_scripts_and_styles() {

	// Add script for blocks
	wp_enqueue_script(
		Theme::handle('blocks'),
		Theme::asset( 'js/blocks.js' ),
		[
			'lodash',
			'wp-blocks',
			'wp-components',
			'wp-data',
			'wp-editor',
			'wp-element',
			'wp-i18n',
		],
		null,
		true // Enqueue the script in the footer.
	);

	// By depending on frontend-style the editor style is later in the cascade
	wp_enqueue_style(
		Theme::handle('blocks'),
		Theme::asset( 'css/blocks.editor.css' ),
		array( 'wp-edit-blocks' )
	);
}
