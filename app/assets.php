<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/**
	 * Enqueue theme styles and scripts to the frontend
	 */
	add_action( 'wp_enqueue_scripts', function() {

		// Add theme stylesheet
		wp_enqueue_style( 
			App::handle(), 
			App::asset( 'css/style.css' ), 
			null, 
			null 
		);

		// Add theme scripts
		wp_enqueue_script( 
			App::handle(), 
			App::asset( 'js/theme.js' ), 
			null, 
			null, 
			true 
		);
	} );

	/**
	 * Load external font (editor and frontend).
	 */
	add_action( 'enqueue_block_assets', function() {

		/**
		 * We use wptt_get_webfont to download the file locally to improve performance and privacy.
		 *
		 * @link https://github.com/WPTT/webfont-loader
		 */
		wp_enqueue_style( 
			App::handle('font'), 
			wptt_get_webfont_url( 'https://use.typekit.net/pwk2csi.css' ), 
			null, 
			App::get_version() 
		);
	});

	/**
	 * Enqueue editor style
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#enqueuing-the-editor-style
	 */
	add_editor_style( App::asset( 'css/editor-style.css' ) );

	/**
	 * Add scripts and styles (editor)
	 */
	add_action( 'enqueue_block_editor_assets', function() {

		// // Add script for block editor
		// wp_enqueue_script( 
		// 	App::handle('block-editor'), 
		// 	App::asset( 'js/block-editor.js' ), 
		// 	[ 
		// 		'wp-blocks', 
		// 		'wp-i18n', 
		// 		'wp-data', 
		// 		'wp-dom-ready', 
		// 		'wp-edit-post', 
		// 		'wp-hooks'
		// 	] 
		// );

		// // Temporary fix to remove max-width from .wp-block
		// wp_register_style( App::handle('wp-block-fix'), false, array(), true, true );
		// wp_add_inline_style( App::handle('wp-block-fix'), '.wp-block { max-width: none; }' );
		// wp_enqueue_style( App::handle('wp-block-fix') );

		// // Add style for blocks
		// wp_enqueue_style( 
		// 	App::handle('blocks'),
		// 	App::asset( 'css/blocks.editor.css' ),
		// 	array( 'wp-edit-blocks' ) // By depending on frontend-style the editor style is later in the cascade
		// );

		// // Add script for blocks
		// wp_enqueue_script( 
		// 	App::handle('blocks'),
		// 	App::asset( 'js/blocks.js' ),
		// 	[
		// 		'lodash',
		// 		'wp-blocks',
		// 		'wp-components',
		// 		'wp-data',
		// 		'wp-editor',
		// 		'wp-element',
		// 		'wp-i18n',
		// 	],
		// 	null,
		// 	true // Enqueue the script in the footer.
		// );
	});

});
