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
	add_filter( 'extra_entry_classes', __NAMESPACE__ . '\manage_extra_entry_classes', 10, 3 );

	// Excerpt
	add_filter( 'excerpt_more',   __NAMESPACE__ . '\edit_excerpt_more' ); // Remove link from excerpt
	add_filter( 'excerpt_length', __NAMESPACE__ . '\edit_excerpt_length' );
	add_filter( 'wp_trim_excerpt', __NAMESPACE__ . '\trim_manual_excerpt', 10, 2 );



}, 5 );


/**
 * Manage the extra entry classes
 */
function manage_extra_entry_classes( $classes, $extra_classes, $post_type ) {

	if ($status = get_password_protection_status()) {
		$classes[] = 'is-password-protected';
		$classes[] = "is-password-protected--$status";
	}

	if ( !is_search() && has_post_thumbnail() ) {
		$classes[] = 'has-featured-image';
	}

	if ( $post_type == 'post' || $post_type == 'clc_project' || $post_type == 'wbl_project' || $post_type == 'wbl_event' ) {
		$classes[] = 'entry--card';
		// $classes[] = 'entry--is-card';
		$classes[] = 'is-card';
	}
	else {
		$classes[] = 'entry--list';
	}

	return $classes;
}


/**
 * Excerpts
 */
function edit_excerpt_more( $more ) {

    return "&nbsp;<span class=\"excerpt__delimiter\">...<span>";
}

function edit_excerpt_length( $length ) {

	$length = 16;

	if (get_post_type() == 'wbl_project') {
		$length = 10;
	}

    return $length;
}

/**
 * We also want to trim the manual excerpt.
 */
function trim_manual_excerpt( $text, $raw_excerpt ) {

	// If text is the same then we assume manual excerpt
	if ($text == $raw_excerpt) {
		$excerpt_more   = edit_excerpt_more( '' );
		$excerpt_length = edit_excerpt_length( 0 );
		$text           = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}

    return $text;
}

