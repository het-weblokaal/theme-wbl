<?php
/**
 * Setup Block Editor assets.
 */

namespace WBL\Theme;

/**
 * Remove core editor google font
 */
function remove_google_font() {
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );
}