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
			Theme::handle(), 
			Theme::asset( 'css/style.css' ), 
			null, 
			null 
		);

		// Add theme scripts
		wp_enqueue_script( 
			Theme::handle(), 
			Theme::asset( 'js/theme.js' ), 
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
			Theme::handle('font'), 
			wptt_get_webfont_url( 'https://use.typekit.net/pwk2csi.css' ), 
			null, 
			Theme::get_version() 
		);
	});

	/**
	 * Add global color inline style (editor and frontend).
	 *
	 * Mimics the global styles which are experimental in the plugin
	 *
	 * @link: https://github.com/WordPress/gutenberg/blob/trunk/lib/global-styles.php
	 */
	add_action( 'enqueue_block_assets', function() {

		// Get theme colors from theme-support
	    $theme_colors = get_theme_support( 'editor-color-palette' )[0] ?? [];

	    if ($theme_colors) {

	        $css = ":root { \n";
	        foreach ( $theme_colors as $color ) {
	            $css .= "   --wp--preset--color--{$color['slug']}: {$color['color']};\n";
	        }
	        $css .= "}";

			// Register global styles
			wp_register_style( Theme::handle('global-color'), false, array(), true, true );
			wp_add_inline_style( Theme::handle('global-color'), $css );
			wp_enqueue_style( Theme::handle('global-color') );
		}

	});

	/**
	 * Enqueue editor style
	 *
	 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#enqueuing-the-editor-style
	 */
	add_editor_style( Theme::asset( 'css/editor-style.css' ) );

	/**
	 * Add scripts and styles (editor)
	 */
	add_action( 'enqueue_block_editor_assets', function() {

		// Add script for block editor
		wp_enqueue_script( 
			Theme::handle('block-editor'), 
			Theme::asset( 'js/block-editor.js' ), 
			[ 
				'wp-blocks', 
				'wp-i18n', 
				'wp-data', 
				'wp-dom-ready', 
				'wp-edit-post', 
				'wp-hooks'
			] 
		);

		// // Add style for blocks
		// wp_enqueue_style( 
		// 	Theme::handle('blocks'),
		// 	Theme::asset( 'css/blocks.editor.css' ),
		// 	array( 'wp-edit-blocks' ) // By depending on frontend-style the editor style is later in the cascade
		// );

		// // Add script for blocks
		// wp_enqueue_script( 
		// 	Theme::handle('blocks'),
		// 	Theme::asset( 'js/blocks.js' ),
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
