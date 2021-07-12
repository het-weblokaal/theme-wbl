<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Render archive loop block
	add_filter( 'wbl/blocks/archive-loop/render', __NAMESPACE__ . '\render_archive_loop_block', 10, 2 );

	// Render posts block
	add_filter( 'wbl/blocks/posts/render', __NAMESPACE__ . '\render_posts_block', 10, 2 );

}, 5 );

/**
 * Render the archive loop through a block
 *
 * @return  string
 */
function render_archive_loop_block( $render, $attributes ) {

	if ( ! is_post_type_archive() && ! is_home() ) {
		return false;
	}

	if ( get_post_type_on_archive() == 'wbl_project' ) {
		$render = Template::render( 'loop/work', null );
	}
	else {
		$render = Template::render( 'loop/blog', null );
	}	

	return $render;
}

/**
 * Render the posts through a block
 *
 * @return  string
 */
function render_posts_block( $render, $attributes ) {

	$query_args = [
		'posts_per_page'   => $attributes['postsToShow'],
		'post_type'        => 'post',
		// 'post_status'      => 'publish',
		// 'order'            => $attributes['order'],
		// 'orderby'          => $attributes['orderBy'],
		// 'suppress_filters' => false,
	];

	// Extra classes
	$extra_classes = [];

	// Alignment
	if (! empty($args['align'])) {
		$extra_classes[] = 'align' . $args['align'];
	}

	$render = Template::render( 'loop/blog', null, [
		'query_args' => $query_args,
		'extra_classes' => $extra_classes
	] );

	return $render;
}
