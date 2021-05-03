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

namespace WBL\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


# ------------------------------------------------------------------------------
# Load Dependencies
# ------------------------------------------------------------------------------

/**
 * Composer Dependancies
 */
if ( file_exists( Theme::get_vendor_path( 'autoload.php' ) ) ) {
	require_once( Theme::get_vendor_path( 'autoload.php' ) );
}

/**
 * Webfont Loader by WordPress Themes Theme
 *
 * @link https://make.wordpress.org/themes/2020/09/25/new-package-to-allow-locally-hosting-webfonts/
 */
if ( file_exists( Theme::get_vendor_path( 'wptt-webfont-loader.php' ) ) ) {
	require_once( Theme::get_vendor_path( 'wptt-webfont-loader.php' ) );
}


# ------------------------------------------------------------------------------
# Load 'setup' files.
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( Theme::get_app_path( "{$file}.php" ) );
}, [
	'setup/assets',
	// 'setup/block-editor',
	// 'setup/block-editor-assets',
	// 'setup/blocks',
	// 'setup/cleanup',
	// 'setup/customizer',
	// 'setup/custom-templates',
	// 'setup/dependencies',
	// 'setup/entry',
	// 'setup/general',
	// 'setup/loop',
	// 'setup/media',
	// 'setup/menu',
	// 'setup/newsletter',
	// 'setup/page',
	// 'setup/password-protection',
	// 'setup/polylang',
	// 'setup/posts',
	// 'setup/seo',
] );

