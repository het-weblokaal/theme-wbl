<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Inform WordPress of custom language directory
	load_theme_textdomain( 'theme-wbl', App::path( App::get_lang_dir() ) );

	// Colors
	add_theme_support( 'editor-color-palette', [
		[
			'name' => __( 'Primary Color', 'theme-wbl' ),
			'slug' => 'primary-1',
			'color' => '#FFF7D6' //'#fff5cc',
		],
		[
			'name' => __( 'Secondary Color', 'theme-wbl' ),
			'slug' => 'secondary-1',
			'color' => '#000000',
		]
	] );


	// Excerpts
	add_filter( 'excerpt_length', __NAMESPACE__ . '\excerpt_length' );

	add_filter( 'body_class', __NAMESPACE__ . '\add_page_image_class', 11, 2 );

	// Render archive loop block
	add_filter( 'wbl/blocks/archive-loop/render', __NAMESPACE__ . '\render_archive_loop_block', 10, 2 );

	// Render posts block
	add_filter( 'wbl/blocks/posts/render', __NAMESPACE__ . '\render_posts_block', 10, 2 );

}, 5 );

/**
 * Excerpt length
 */
function excerpt_length( $length ) {
    return 24;
}

/**
 * Add page image class
 */
function add_page_image_class( $classes ) {

	if (is_singular() && has_post_thumbnail()) {
		$classes[] = 'has-page-image';
	}

	return $classes;
}

/**
 * Render the archive loop through a block
 *
 * @return  string
 */
function render_archive_loop_block( $render, $attributes ) {

	if ( ! is_post_type_archive() ) {
		return false;
	}

	if ( get_post_type_on_archive() == 'wbl_project' ) {
		$render = Template::render( 'loop/grid', null );
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
