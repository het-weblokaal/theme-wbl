<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

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

	// Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	// Setup block pattern category
	// register_block_pattern_category( Theme::get_id(), [ 'label' => Theme::get_name() ], 'Theme category' );

	// Setup block patterns
	// register_block_pattern( Theme::get_id() . "/hero", require Theme::template_path( 'block-patterns/hero.php' ) );

}, 5 );


/**
 * Manage scripts/styles on frontend + backend
 */
add_action( 'enqueue_block_assets', function() {

	// Load font
	// wp_enqueue_style( Theme::handle('roboto-font'), wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap' ), null, Theme::get_version() );

	// Add global color inline style
	enqueue_global_color_inline_style();
});

/**
 * Manage scripts/styles on frontend
 */
add_action( 'wp_enqueue_scripts', function() {

	// Remove Gutenberg styles
	wp_dequeue_style( 'wp-block-library' );

	// Add theme scripts
	wp_enqueue_script( Theme::handle(), Theme::asset( 'js/app.js' ), null, null, true );

	// Add theme styles
	wp_enqueue_style( Theme::handle(), Theme::asset( 'css/style.css' ), null, null );
} );

/**
 * Block editor assets
 */
add_action( 'enqueue_block_editor_assets', function() {

	// Remove core editor google font
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );

	// Add script to cleanup unwanted functionality
	wp_enqueue_script( Theme::handle('block-editor'), Theme::asset( 'js/block-editor.js' ), [ 'wp-blocks', 'wp-i18n', 'wp-data', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks' ] );

	// Add the themes editor styles to the editor
	// wp_enqueue_style( Theme::handle('editor'), Theme::asset( 'css/editor-style.css' ), null, null );

	// Scripts.
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

	// Styles
	// By depending on frontend-style the editor style is later in the cascade
	wp_enqueue_style(
		Theme::handle('blocks'),
		Theme::asset( 'css/blocks.editor.css' ),
		array( 'wp-edit-blocks', 'wbl-blocks' )
	);

});
