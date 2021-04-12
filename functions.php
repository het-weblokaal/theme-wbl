<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Load the WBL App
require_once( __DIR__ . '/vendor/wbl-app.php' );

// Customize WBL App
Theme_WBL\App::customize( [
	'template_dir' => 'resources/views'
] );

// Bootstrap
Theme_WBL\App::bootstrap();