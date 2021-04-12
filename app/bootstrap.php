<?php
/**
 * Autoload bootstrap file.
 *
 * This file is used to autoload classes and functions necessary for the theme
 * to run.
 *
 * @package   Theme_WBL
 * @author    Erik Joling <erik.info@hetweblokaal.nl>
 * @copyright 2021 Het Weblokaal
 * @link      https://www.hetweblokaal.nl/
 */

namespace Theme_WBL;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


# ------------------------------------------------------------------------------
# Load Dependencies
# ------------------------------------------------------------------------------

/**
 * Composer Dependancies
 */
if ( file_exists( App::vendor_path( 'autoload.php' ) ) ) {
	require_once( App::vendor_path( 'autoload.php' ) );
}

/**
 * Webfont Loader by WordPress Themes Theme
 *
 * @link https://make.wordpress.org/themes/2020/09/25/new-package-to-allow-locally-hosting-webfonts/
 */
if ( file_exists( App::vendor_path( 'wptt-webfont-loader.php' ) ) ) {
	require_once( App::vendor_path( 'wptt-webfont-loader.php' ) );
}


# ------------------------------------------------------------------------------
# Autoload functions files.
# ------------------------------------------------------------------------------
App::log('test');
array_map( function( $file ) {
	require_once( App::inc_path( "{$file}.php" ) );
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

