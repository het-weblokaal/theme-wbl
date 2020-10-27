<?php
/**
 * Autoload bootstrap file.
 *
 * This file is used to autoload classes and functions necessary for the theme
 * to run. Classes utilize the PSR-4 autoloader in Composer which is defined in
 * `composer.json`.
 *
 * @package   HWL\WBL
 * @author    Erik Joling <erik.info@hetweblokaal.nl>
 * @copyright 2020 Het Weblokaal
 * @link      https://www.hetweblokaal.nl/
 */

namespace Theme_WBL;


# ------------------------------------------------------------------------------
# Autoload Composer Dependancies
# ------------------------------------------------------------------------------

if ( file_exists( App::get_file_path( 'vendor/autoload.php' ) ) ) {
	require_once( App::get_file_path( 'vendor/autoload.php' ) );
}

# ------------------------------------------------------------------------------
# Autoload classes files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( App::get_file_path( "app/classes/{$file}.php" ) );
}, [
	'Compatibility',
	'Config',
	'View',
	'Utils',
	'ThemeSupport',
	'ThemeDependencies',
] );

# ------------------------------------------------------------------------------
# Autoload functions files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( App::get_file_path( "app/{$file}.php" ) );
}, [
	'functions-setup',
	'functions-assets',
	'functions-filters',
	'functions-template-components',
	'functions-template-helpers',
	'functions-comment',
	'functions-call-to-action',
	'functions-footer',
] );

# ------------------------------------------------------------------------------
# Autoload other
# ------------------------------------------------------------------------------

/**
 * Webfont Loader by WordPress Themes Theme
 *
 * @link https://make.wordpress.org/themes/2020/09/25/new-package-to-allow-locally-hosting-webfonts/
 */
require_once( App::get_file_path( "vendor/wptt-webfont-loader.php" ) );
