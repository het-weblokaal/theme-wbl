<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 */

namespace WBL\Theme;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Load the WBL App
require_once( __DIR__ . '/vendor/het-weblokaal/wbl-theme-foundation/bootstrap.php' );

// Bootstrap
require_once( Theme::get_app_path( 'bootstrap.php' ) );