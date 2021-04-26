<?php

/**
 * Meta template functions
 *
 * Things like categories, author, date...
 */

namespace WBL\Theme;

/**
 * Render Terms for specific taxonomy
 *
 * @var string $tax_id
 * @var array $args
 */
function render_terms( $tax_id, $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		
		// Separates tags, categories, etc. when displaying a post.
		'sep'  => _x( ', ', 'taxonomy terms separator', 'clc' ),

		// Generate links or spans
		'link' => true,
	] );

	// Get terms
	$terms = get_the_terms( null, $tax_id );

	// Make sure we have an array
	$terms = (is_array($terms)) ? $terms : [];

	# Setup list
	$term_links = [];

	# Render term links
	foreach ($terms as $term) {

		if ($args['link']) {
			$term_links[] = sprintf( '<a href="%s">%s</a>', get_term_link($term), $term->name );
		}
		else {
			$term_links[] = sprintf( '<span>%s</span>', $term->name );
		}
	}

	// Apply the expected WordPress filter.
	$term_links = apply_filters( "term_links-$tax_id", $term_links );

	// Glue it together with the give separator
	$html = join( $args['sep'], $term_links );

	return $html;
}

/**
 * Returns the post date HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_date( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'format' => get_option( 'date_format' ),
		'nicename' => false,
	] );

	// Get post date
	$date = get_the_date( $args['format'] );

	// Get nicename of the date
	if ($args['nicename']) {		

		// return 'today', 'yesterday' or date
		if ($date == wp_date( $args['format'] ) ) {
			$date = __('Vandaag', 'clc');
		}
		elseif ($date == wp_date( $args['format'], strtotime("-1 days") ) ) {
			$date = __('Gisteren', 'clc');
		}
		elseif ($date == wp_date( $args['format'], strtotime("-2 days") ) ||
			    $date == wp_date( $args['format'], strtotime("-3 days") ) ||
			    $date == wp_date( $args['format'], strtotime("-4 days") ) ) {
			$date = sprintf( _x('Afgelopen %s', 'datum', 'clc'), get_the_date( 'l' ) );
		}
	}

	$html = sprintf(
		'<time datetime="%s">%s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		sprintf( $args['text'], $date )
	);

	return $html;
}

/**
 * Returns the post author HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_author( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'link'   => true,
	] );

	$author = get_the_author();

	if ( $args['link'] ) {
		$url = get_author_posts_url( get_the_author_meta( 'ID' ) );

		$html = sprintf(
			'<a href="%s">%s</a>',
			esc_url( $url ),
			$author
		);
	}
	else {
		$html = sprintf( '<span>%s</span>', $author );
	}

	return $html;
}
