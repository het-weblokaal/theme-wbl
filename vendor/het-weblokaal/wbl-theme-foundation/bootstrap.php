<?php
/**
 * WordPress Theme package by Het Weblokaal
 *
 * Version: 1.0-alpha-13
 * Author: Erik Joling | Het Weblokaal <erik.info@hetweblokaal.nl>
 * Author URI: https://www.hetweblokaal.nl/
 *
 * This package offers a standardized code organization and adds a template foundation.
 *
 *
 * Usage:
 * 1. Copy this package in the vendor folder (composer)
 * 2. Load this file in your functions.php
 * 3. Customize some properties through static::customize()
 */

namespace WBL\Theme;

// Load Theme class
require_once( "classes/Theme.php" );

// Load Template class
require_once( "classes/Template.php" );

// Load template functions
array_map( function( $file ) {
	require_once( "template/functions/{$file}.php" );
}, [
	'helpers',
	'media',
	'menu',
	'page',
	'polylang',
	'entry',
	'loop',
	'meta',
	'html-head',
	'site-branding',
	'site-footer',
] );
