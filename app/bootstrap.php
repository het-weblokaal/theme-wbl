<?php

namespace WBL\Theme;

# ------------------------------------------------------------------------------
# Load Theme Foundation
# ------------------------------------------------------------------------------

if ( wp_get_environment_type() == 'local' ) {
	require_once( get_template_directory() . '/../wbl-theme-foundation/app/bootstrap.php' );

	App::customize([
		'foundation_dir' => '../wbl-theme-foundation'
	]);
}
else {
	require_once( get_template_directory() . '/vendor/het-weblokaal/wbl-theme-foundation/app/bootstrap.php' );
}


# ------------------------------------------------------------------------------
# Load Theme Dependencies
# ------------------------------------------------------------------------------

/**
 * Composer Dependancies
 */
if ( file_exists( App::get_vendor_path( 'autoload.php' ) ) ) {
	require_once( App::get_vendor_path( 'autoload.php' ) );
}

/**
 * Load webfont loader
 */
if ( file_exists( App::get_vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) ) ) {
	require_once( App::get_vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) );
}


# ------------------------------------------------------------------------------
# Load Theme files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( App::get_app_path( "{$file}.php" ) );
}, [
	'general',
	'assets',
	'block-editor',
	'call-to-action',
	'footer',
] );

