<?php

namespace WBL\Theme;

# ------------------------------------------------------------------------------
# Load Theme Foundation
# ------------------------------------------------------------------------------

if ( wp_get_environment_type() == 'local' && file_exists( '/srv/www/local/wbl-theme-foundation/app/bootstrap.php' ) ) {
	require_once( '/srv/www/local/wbl-theme-foundation/app/bootstrap.php' );

	App::boot([
		'foundation_dir' => '/srv/www/local/wbl-theme-foundation'
	]);
}
else {
	require_once( get_template_directory() . '/vendor/het-weblokaal/wbl-theme-foundation/app/bootstrap.php' );

	App::boot();
}


# ------------------------------------------------------------------------------
# Load Theme Dependencies
# ------------------------------------------------------------------------------

/**
 * Composer Dependancies
 */
if ( file_exists( App::vendor_path( 'autoload.php' ) ) ) {
	require_once( App::vendor_path( 'autoload.php' ) );
}

/**
 * Load webfont loader
 */
if ( file_exists( App::vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) ) ) {
	require_once( App::vendor_path( 'wptt/webfont-loader/wptt-webfont-loader.php' ) );
}


# ------------------------------------------------------------------------------
# Load Theme files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( App::app_path( "{$file}.php" ) );
}, [
	'general',
	'assets',
	'block-editor',
	'call-to-action',
	'footer',
	'wbl-blocks',
	'wbl-projects',
] );

