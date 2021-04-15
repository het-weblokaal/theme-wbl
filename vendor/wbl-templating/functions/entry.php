<?php
/**
 * Template entry functions.
 */

namespace ClimateCampus;


/**
 * Returns the entry classes.
 *
 * @return string
 */
function render_extra_entry_classes( $extra_classes = [] ) {

	// If we want to incorporate expected WordPress filter `post_class`
	// $classes = get_post_class();

	$classes = [];

	// Set post type
	$post_type = (is_search()) ? 'search' : get_post_type();

	// Add post_type as modifier
	$classes[] =  "entry--{$post_type}";

	// Add extra classes as modifiers to base-class
	foreach ( (array) $extra_classes as $extra_class) {
		$classes[] =  $extra_class;
	}

	// Apply filters just like post_class
	$classes = apply_filters( 'extra_entry_classes', $classes, $extra_classes, $post_type );

	return html_classes($classes);
}

function display_extra_entry_classes( $extra_classes = [], $post_type = null ) {

	echo render_extra_entry_classes( $extra_classes, $post_type );

}
