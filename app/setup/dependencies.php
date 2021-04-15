<?php
/**
 * Theme cleanup functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Register the required plugins for this theme.
	add_action( 'tgmpa_register', __NAMESPACE__ . '\register_dependencies' );

}, 5 );

/**
 * Register the required plugins for this theme.
 *
 * @link https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/example.php
 */
function register_dependencies() {

	$tgmpa = App::config('dependencies');

	$tgmpa_plugins = $tgmpa['plugins'] ?? [];
	$tgmpa_config = $tgmpa['config'] ?? [];

	tgmpa( $tgmpa_plugins, $tgmpa_config );
}
