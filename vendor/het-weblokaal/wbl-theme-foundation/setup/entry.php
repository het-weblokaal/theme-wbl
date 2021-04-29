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


/**
 * Manage the extra entry classes
 */
function extra_entry_classes( $template_data ) {

	if ($status = get_password_protection_status()) {
		$template_data['args']['extra_classes'][] = 'is-password-protected';
		$template_data['args']['extra_classes'][] = "is-password-protected--$status";
	}

	if ( has_post_thumbnail() ) {
		$template_data['args']['extra_classes'][] = 'has-featured-image';
	}

	return $template_data;
}


/**
 * Excerpts
 */
function edit_excerpt_more( $more ) {

    return "&nbsp;<span class=\"excerpt__delimiter\">...<span>";
}
