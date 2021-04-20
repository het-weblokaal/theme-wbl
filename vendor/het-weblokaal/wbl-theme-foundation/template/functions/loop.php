<?php
/**
 * Template entry functions.
 */

namespace WBL\Theme;


/**
 * Returns the extra loop classes.
 *
 * @param array $extra_classes
 * @param string $post_type | when null we assume the main-query on archive page
 * @return string
 */
function render_extra_loop_classes( $extra_classes = [], $post_type = null ) {

	$classes = [];

	# Set post type
	if ( !$post_type ) {
		$post_type = (is_search()) ? 'search' : get_post_type();
	}

	# Add post_type as modifier
	$classes[] =  "loop--{$post_type}";

	# Add extra classes as modifiers to base-class
	foreach ( (array) $extra_classes as $extra_class) {
		$classes[] = $extra_class;
	}

	# Apply filters just like post_class
	$classes = apply_filters( 'extra_loop_classes', $classes, $extra_classes, $post_type );

	return html_classes($classes);
}

function display_extra_loop_classes( $extra_classes = [], $post_type = null ) {

	echo render_extra_loop_classes( $extra_classes, $post_type );

}
