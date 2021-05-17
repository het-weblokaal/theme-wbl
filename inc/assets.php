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
	 * Loads external typekit font (editor and frontend).
	 * 
	 * Also note we use wptt_get_webfont to download the file locally to improve performance and privacy.
	 *
	 * @link https://github.com/WPTT/webfont-loader
	 */
	add_action( 'enqueue_block_assets', function() {
		wp_enqueue_style( Theme::handle('font'), wptt_get_webfont_url( 'https://use.typekit.net/pwk2csi.css' ), null, Theme::get_version() );
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
	 * Add scripts and styles (editor)
	 */
	add_action( 'enqueue_block_editor_assets', function() {

		// Add script for blocks
		wp_enqueue_script( Theme::handle('blocks'),
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

		// Add style for blocks
		wp_enqueue_style( Theme::handle('blocks'),
			Theme::asset( 'css/blocks.editor.css' ),
			array( 'wp-edit-blocks' ) // By depending on frontend-style the editor style is later in the cascade
		);
	});

});
