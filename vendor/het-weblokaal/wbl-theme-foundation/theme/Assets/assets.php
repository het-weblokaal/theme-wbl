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

	// Make theme data available in JS
	add_action( 'wp_footer', 'WBL\Theme\add_theme_data_script' );
	add_action( 'admin_footer', 'WBL\Theme\add_theme_data_script' );

}, 5 );

/**
 * Make theme data (like version) available to scripts
 */
function add_theme_data_script() {

	$theme = [
		'id' => Theme::get_id(),
		'version' => Theme::get_version(),
		'assetUri' => Theme::get_asset_uri(),
	];

	echo "<script>var theme = ", json_encode( $theme, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ), "</script>";
}
