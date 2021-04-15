<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 */

namespace Theme_WBL;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Load the WBL App
require_once( __DIR__ . '/vendor/wbl-app.php' );

// Customize WBL App
App::customize( [
	'template_dir' => 'vendors/wbl-templating/views'
] );

// Bootstrap
App::bootstrap();