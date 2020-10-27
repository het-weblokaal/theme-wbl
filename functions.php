<?php
/**
 * Theme functions file.
 *
 * This file is used to bootstrap the theme.
 *
 * @package   Ejo\Theme\Erik
 * @author    Erik Joling <erik@joling.me>
 * @copyright 2020 Erik Joling
 */

namespace Theme_WBL;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Load the app class
require_once( 'app/classes/App.php' );

// Boot the app
App::boot();
