<?php
/**
 * Theme loop functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Change loop classes
	add_filter( 'extra_loop_classes', __NAMESPACE__ . '\manage_extra_loop_classes', 10, 3 );


}, 5 );


/**
 * Manage extra loop classes
 */
function manage_extra_loop_classes( $classes, $extra_classes, $post_type ) {

	if ( $post_type == 'post' || $post_type == 'clc_project' || $post_type == 'wbl_project' || $post_type == 'wbl_event' ) {
		$classes[] = 'loop--card-layout';
		// $classes[] = 'loop--has-card-layout';
		// $classes[] = 'has-card-layout';
	}
	else {
		$classes[] = 'loop--list-layout';
	}

	return $classes;
}
