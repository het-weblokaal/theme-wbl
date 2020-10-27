<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 */

namespace Theme_WBL;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load dynamic blocks and their functions
// require_once( App::get_file_path( 'resources/blocks/posts/index.php' ) );

// Register blocks
// add_action( 'init', __NAMESPACE__ . '\register_block_posts' );

// Hook assets
add_action( 'enqueue_block_editor_assets', 	__NAMESPACE__ . '\block_editor_assets' ); // Hook: Backend assets.
add_action( 'enqueue_block_assets', 		__NAMESPACE__ . '\block_assets' );        // Hook: Frontend+backend assets.


/**
 * Enqueue Gutenberg block assets for backend editor.
 */
function block_editor_assets() {

	// Scripts.
	wp_enqueue_script(
		'wbl-blocks--editor',
		Utils::asset('js/blocks.js'),
		[ 'wp-blocks', 'wp-i18n', 'wp-components', 'wp-editor', 'wp-data', 'wp-edit-post', 'wp-plugins', 'lodash' ],
		false,
		true // Enqueue the script in the footer.
	);

	// Styles.
	wp_enqueue_style(
		'wbl-blocks--editor',
		Utils::asset('css/blocks.editor.css'),
		[ 'wp-edit-blocks' ],
		false
	);
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 */
function block_assets() {

	// // Styles.
	// wp_enqueue_style(
	// 	'wbl-blocks',
	// 	get_uri() . '/assets/css/blocks.css',
	// 	array( 'wp-editor' ),
	// 	filemtime( get_dir() . '/assets/css/blocks.css' ) // Version: File modification time.
	// );
}
