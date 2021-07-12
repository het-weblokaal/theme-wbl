<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Render projects block
	add_filter( 'wbl/projects/block/render', __NAMESPACE__ . '\render_projects_block', 10, 2 );

}, 5 );


/**
 * Render the projects through a block
 *
 * @return  string
 */
function render_projects_block( $render, $attributes ) {

	$query_args = [
		'posts_per_page'   => $attributes['postsToShow'],
		'post_type'        => 'wbl_project',
		// 'post_status'      => 'publish',
		// 'order'            => $attributes['order'],
		// 'orderby'          => $attributes['orderBy'],
		// 'suppress_filters' => false,
	];

	// Extra classes
	$extra_classes = array();

	// Alignment
	if (! empty($args['align'])) {
		$extra_classes[] = 'align' . $args['align'];
	}

	$render = Template::render( 'loop/work', null, [
		'query_args' => $query_args,
		'extra_classes' => $extra_classes
	] );

	return $render;

};