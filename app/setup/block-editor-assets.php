<?php
/**
 * Setup Block Editor assets.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Add editor style */
	add_editor_style( Theme::asset( 'css/editor-style.css' ) );
	// remove_editor_styles();

	# Load blocks in editor
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\manage_block_editor_assets' );

	# Remove block directory (installation of new blocks through the editor)
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );

}, 5 );

/**
 * Enqueue Gutenberg block assets for backend editor.
 */
function manage_block_editor_assets() {

	# Remove core editor google font
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );

	# Add script to cleanup unwanted functionality
	wp_enqueue_script( Theme::handle('block-editor'), Theme::asset( 'js/block-editor.js' ), [ 'wp-blocks', 'wp-i18n', 'wp-data', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks' ] );

	# Add the themes editor styles to the editor
	# wp_enqueue_style( Theme::handle('editor'), Theme::asset( 'css/editor-style.css' ), null, null );

	# Add global color inline style
	enqueue_global_color_inline_style();

	# Scripts.
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

	# Styles
	# By depending on frontend-style the editor style is later in the cascade
	wp_enqueue_style(
		Theme::handle('blocks'),
		Theme::asset( 'css/blocks.editor.css' ),
		array( 'wp-edit-blocks', 'wbl-blocks' )
	);
}