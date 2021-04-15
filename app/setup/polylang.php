<?php
/**
 * Polylang setup.
 */

namespace WBL\Theme;

/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Set the classname of the language switcher in the navigation menu
	add_filter( 'clc_nav_menu_css_class', __NAMESPACE__ . '\add_polylang_menu_class', 10, 2 );

	// Update file path of customizer polylang script
	add_filter( 'theme_file_uri', __NAMESPACE__ . '\update_polylang_customizer_script_location', 10, 2 );

	// Add support for extra options in customizer polylang
	add_filter( 'pll_customizer_excluded_customizer_sections', __NAMESPACE__ . '\exclude_customizer_sections' );


}, 5 );


/**
 * Add polylang class
 */
function add_polylang_menu_class( $classes, $item ) {

	# Check item for polylang identifier
	if ( $item->url === '#pll_switcher' ) {

		# Add polylang indicator to classes
		$classes[] = 'menu__item--language-switcher';

		# Try to remove active states from classes
		$classes = array_diff( $classes, [ "menu__item--current", "menu__item--parent", "menu__item--ancestor" ] );
	}

	return $classes;
}

/**
 * Update location of polylang customizer script
 */
function update_polylang_customizer_script_location($url, $file) {
	if ($file == 'js/polylang-customizer.js') {
		$url = Theme::file_uri( Theme::get_vendor_dir() . "/polylang-customizer/{$file}" );
	}

	return $url;
}

/**
 * ...
 */
function exclude_customizer_sections($sections) {

	$sections[] = 'social_media';
	
	return $sections;
}

