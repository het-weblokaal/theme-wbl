<?php
/**
 * Asset-related functions and filters.
 *
 * This file holds some setup actions for scripts and styles as well as a helper
 * functions for work with assets.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Manage General Assets (Frontend + Backend) */
	add_action( 'enqueue_block_assets', __NAMESPACE__ . '\manage_general_assets');

	/* Manage Frontend assets */
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\manage_frontend_assets' );

	// Make theme data available in JS
	add_action( 'wp_footer', __NAMESPACE__ . '\theme_data_script' );
	add_action( 'admin_footer', __NAMESPACE__ . '\theme_data_script' );

}, 5 );

/**
 * Manage scripts/styles on frontend + backend
 */
function manage_general_assets() {

	// Load font
	wp_enqueue_style( Theme::handle('roboto-font'), wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap' ), null, Theme::get_version() );

	// Add global color inline style
	enqueue_global_color_inline_style();
}

/**
 * Manage scripts/styles on frontend
 */
function manage_frontend_assets() {

	// Remove Gutenberg styles
	wp_dequeue_style( 'wp-block-library' );

	// Add theme scripts
	wp_enqueue_script( Theme::handle(), Theme::asset( 'js/app.js' ), null, null, true );

	// Add theme styles
	wp_enqueue_style( Theme::handle(), Theme::asset( 'css/style.css' ), null, null );
}

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


/**
 * Make theme data (like version) available to scripts
 */
function theme_data_script() {

	$theme = [
		'id' => Theme::get_id(),
		'version' => Theme::get_version(),
		'assetUri' => Theme::get_asset_uri(),
	];

	echo "<script>var theme = ", json_encode( $theme, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "</script>";
}
