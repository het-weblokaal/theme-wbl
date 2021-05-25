<?php

namespace WBL\Theme;

# ------------------------------------------------------------------------------
# Load Theme Foundation
# ------------------------------------------------------------------------------

// Load the Theme Foundation
// require_once( __DIR__ . '/vendor/het-weblokaal/wbl-theme-foundation/bootstrap.php' );
require_once( __DIR__ . '/../../wbl-theme-foundation/bootstrap.php' );

// Customize Theme class
Theme::customize( [
	'app_dir'      => 'inc',
	'template_dir' => 'inc/views',
	'blocks_dir'   => 'inc/blocks',
]);

// Customize Template class
Template::customize( [
	'main_template_dir' => '../wbl-theme-foundation/template/views',
	'custom_template_dir' => 'inc/views',
] );


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

