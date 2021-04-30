<?php
/**
 * Setup Block Editor assets.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Remove google fonts
	add_action( 'enqueue_block_editor_assets', 'WBL\Theme\remove_google_font' );

	// Remove block directory (installation of new blocks through the editor)
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );

}, 5 );

/**
 * Remove core editor google font
 */
function remove_google_font() {
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );
}