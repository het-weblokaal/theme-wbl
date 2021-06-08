<?php

namespace WBL\Theme;

# ------------------------------------------------------------------------------
# Load Theme Foundation
# ------------------------------------------------------------------------------

if ( wp_get_environment_type() == 'local' ) {
	require_once( __DIR__ . '/../../wbl-theme-foundation/bootstrap.php' );

	// Customize Template class
	Template::customize( [
		'main_template_dir' => '../wbl-theme-foundation/templating'
	] );
}
else {
	require_once( __DIR__ . '/../vendor/het-weblokaal/wbl-theme-foundation/bootstrap.php' );
}

// Customize Theme class
Theme::customize( [
	'app_dir'      => 'app',
	'template_dir' => '',
	'blocks_dir'   => 'app/blocks',
]);


# ------------------------------------------------------------------------------
# Load Theme Dependencies
# ------------------------------------------------------------------------------

/**
 * Composer Dependancies
 */
if ( file_exists( Theme::get_vendor_path( 'autoload.php' ) ) ) {
	require_once( Theme::get_vendor_path( 'autoload.php' ) );
}

/**
 * Load webfont loader
 */
if ( file_exists( Theme::get_vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) ) ) {
	require_once( Theme::get_vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) );
}


# ------------------------------------------------------------------------------
# Load Theme files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( Theme::get_app_path( "{$file}.php" ) );
}, [
	'general',
	'assets',
	'block-editor',
	'call-to-action',
	'footer',
] );

