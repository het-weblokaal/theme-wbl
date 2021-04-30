<?php
/**
 * Theme entry functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Change entry classes
	add_filter( 'wbl/theme/template/data/entry/blog', 'WBL\Theme\extra_entry_classes', 10, 4 );

	// Excerpt
	add_filter( 'excerpt_more',    'WBL\Theme\edit_excerpt_more' ); // Remove link from excerpt

}, 5 );
