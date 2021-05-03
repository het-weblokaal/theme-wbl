<?php
/**
 * Asset-related functions and filters.
 *
 * This file holds some setup actions for scripts and styles as well as a helper
 * functions for work with assets.
 */

namespace WBL\Theme;

/**
 * Enqueue global color inline style
 */
function enqueue_global_color_inline_style() {

	// Get Global Color CSS
	$global_color_css = get_global_color_inline_style();

	if ($global_color_css) {
		// Register global styles
		wp_register_style( Theme::handle('global-color'), false, array(), true, true );
		wp_add_inline_style( Theme::handle('global-color'), $global_color_css );
		wp_enqueue_style( Theme::handle('global-color') );
	}
}

/**
 * Global color styles
 *
 * Mimics the global styles which are experimental in the plugin
 *
 * @link: /wp-content/plugins/gutenberg/lib/global-styles.php
 */
function get_global_color_inline_style() {
	$css = "";

	$theme_colors = get_theme_support( 'editor-color-palette' )[0] ?? [];

	if ($theme_colors) {

		$css = ":root { \n";
		foreach ( $theme_colors as $color ) {
			$css .= "	--wp--preset--color--{$color['slug']}: {$color['color']};\n";
		}
		$css .= "}";
	}

	return $css;
}
