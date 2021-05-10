<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 */

namespace WBL\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Load the Theme Foundation
// require_once( __DIR__ . '/vendor/het-weblokaal/wbl-theme-foundation/bootstrap.php' );
require_once( __DIR__ . '/../wbl-theme-foundation/bootstrap.php' );

// Customize Theme class
Theme::customize( [
	'app_dir'      => 'inc',
	'template_dir' => 'inc/views',
	'blocks_dir'   => 'inc/blocks',
]);

// Customize Template class
Template::customize(['main_template_dir' => '../wbl-theme-foundation/template/views']);

// Bootstrap
require_once( Theme::get_app_path( 'bootstrap.php' ) );
