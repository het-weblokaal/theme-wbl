<?php
/**
 * Theme cleanup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 ); // remove REST API link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove Oembed links which allow the site to be embedded in other sites
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove Shortlink meta
	add_action( 'init', function() { wp_deregister_script( 'wp-embed' ); } ); // Oembed: Remove javascript which is used to embed other sites in a page

	// Viewport and charset
	add_action( 'wp_head', __NAMESPACE__ . '\display_meta_charset',   0 );
	add_action( 'wp_head', __NAMESPACE__ . '\display_meta_viewport',  1 );

}, 5 );
