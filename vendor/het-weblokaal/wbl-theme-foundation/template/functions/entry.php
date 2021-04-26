<?php
/**
 * Template entry functions.
 *
 * Most functions are inspired by Justin Tadlocks Hybrid Core: 
 * https://github.com/themehybrid/hybrid-core/blob/master/src/Post/functions-post.php
 */

namespace WBL\Theme;

/**
 * Returns the post title HTML.
 *
 * @param  array  $args
 * @return string
 */
function entry_title( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'tag'    => 'h2',
		'link'   => false,
		'class'  => 'entry__title',
	] );

	$text = sprintf( $args['text'], get_the_title() );

	if ( $args['link'] ) {
		$text = render_permalink( [ 'text' => $text ] );
	}

	$html = sprintf(
		'<%1$s class="%2$s">%3$s</%1$s>',
		tag_escape( $args['tag'] ),
		esc_attr( $args['class'] ),
		$text
	);

	return apply_filters( 'wbl/theme/entry/title', $html );
}

/**
 * Returns the post permalink HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_permalink( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'class'  => 'entry__permalink',
	] );

	$url = get_permalink();

	$html = sprintf(
		'<a class="%s" href="%s">%s</a>',
		esc_attr( $args['class'] ),
		esc_url( $url ),
		sprintf( $args['text'], esc_url( $url ) )
	);

	return apply_filters( 'wbl/theme/entry/permalink', $html );
}

/**
 * Returns the post author HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_author( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'class'  => 'entry__author',
		'link'   => false,
	] );

	$author = get_the_author();

	if ( $args['link'] ) {
		$url = get_author_posts_url( get_the_author_meta( 'ID' ) );

		$author = sprintf(
			'<a class="entry__author-link" href="%s">%s</a>',
			esc_url( $url ),
			$author
		);
	}

	$html = sprintf( '<span class="%s">%s</span>', esc_attr( $args['class'] ), $author );

	return apply_filters( 'wbl/theme/entry/author', $html );
}

/**
 * Returns the post date HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_date( array $args = [] ) {

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'class'  => 'entry__published',
		'format' => '',
	] );

	$html = sprintf(
		'<time class="%s" datetime="%s">%s</time>',
		esc_attr( $args['class'] ),
		esc_attr( get_the_date( DATE_W3C ) ),
		sprintf( $args['text'], get_the_date( $args['format'] ) )
	);

	return apply_filters( 'wbl/theme/entry/date', $html	);
}

/**
 * Returns the post terms HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_terms( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'taxonomy' => 'category',
		'text'     => '%s',
		'class'    => '',
		'sep'      => ', ',
	] );

	// Append taxonomy to class name.
	if ( ! $args['class'] ) {
		$args['class'] = "entry__terms entry__terms--{$args['taxonomy']}";
	}

	$terms = get_the_term_list( get_the_ID(), $args['taxonomy'], '', $args['sep'], '' );

	if ( $terms ) {

		$html = sprintf(
			'<span class="%s">%s</span>',
			esc_attr( $args['class'] ),
			sprintf( $args['text'], $terms )
		);
	}

	return apply_filters( 'wbl/theme/entry/terms', $html );
}


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
	$classes = apply_filters( 'wbl/theme/entry/extra_classes', $classes, $extra_classes, $post_type );

	return html_classes($classes);
}

function display_extra_entry_classes( $extra_classes = [], $post_type = null ) {

	echo render_extra_entry_classes( $extra_classes, $post_type );

}
