<?php
/**
 * Het Weblokaal Templating Class
 *
 * Version: 0.1
 * Author: Erik Joling | Het Weblokaal <erik.info@hetweblokaal.nl>
 * Author URI: https://www.hetweblokaal.nl/
 *
 * This class offers an API for WordPress themes to implement a standardized template organization
 */

namespace WBL\Templating;


# ------------------------------------------------------------------------------
# Load template classes
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( "classes/{$file}.php" );
}, [
	'Template'
] );

# ------------------------------------------------------------------------------
# Load template functions
# ------------------------------------------------------------------------------

array_map( function( $file ) {
	require_once( "functions/{$file}.php" );
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


/****

Changelog

0.1
- Setup

****/
