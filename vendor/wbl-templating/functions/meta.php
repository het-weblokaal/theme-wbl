<?php

/**
 * Meta template functions
 *
 * Things like categories, author, date...
 */

namespace WBL\Templating;

/**
 * Render Project Terms for specific taxonomy
 */
function render_terms( $taxonomy_id, $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		// Translators: Separates tags, categories, etc. when displaying a post.
		'sep'  => _x( ', ', 'taxonomy terms separator', 'clc' ),
		'link' => true,
	] );

	// Get year terms
	$terms = get_the_terms( null, $taxonomy_id );

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

	/**
	 * Apply the expected WordPress filter.
	 */
	$term_links = apply_filters( "term_links-$taxonomy_id", $term_links );

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
		'format' => '',
	] );

	$html = sprintf(
		'<time datetime="%s">%s</time>',
		esc_attr( get_the_date( DATE_W3C ) ),
		sprintf( $args['text'], get_the_date( $args['format'] ) )
	);

	return $html;
}

/**
 * Returns the post date HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_post_date( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'text'   => '%s',
		'format' => '',
	] );

	// Get post date
	$date = get_the_date();

	// Get stored date format
	$settings_date_format = get_option( 'date_format' );

	// return 'today', 'yesterday' or date
	if ($date == wp_date( $settings_date_format ) ) {
		$date = __('Vandaag', 'clc');
	}
	elseif ($date == wp_date( $settings_date_format, strtotime("-1 days") ) ) {
		$date = __('Gisteren', 'clc');
	}
	elseif ($date == wp_date( $settings_date_format, strtotime("-2 days") ) ||
		    $date == wp_date( $settings_date_format, strtotime("-3 days") ) ||
		    $date == wp_date( $settings_date_format, strtotime("-4 days") ) ) {
		$date = sprintf( _x('Afgelopen %s', 'datum', 'clc'), get_the_date( 'l' ) );
	}
	else {
		// Try to remove current year from string
		// $date = trim(str_replace( date('Y'), "", $date ));
	}

	$html = sprintf(
		'<time datetime="%s">%s</time>',
		esc_attr( get_the_date( 'Y-m-d' ) ),
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


/**
 * Returns the password status HTML.
 *
 * @return string
 */
function render_password_protection_status() {

	$html = '';

	$status = get_password_protection_status();

	if ($status == 'locked') {
		$html = '<span class="password-protection-status">'. App::svg('lock-alt') .'</span>';
	}
	elseif ($status == 'opened') {
		$html = '<span class="password-protection-status">'. App::svg('lock-open-alt') .'</span>';
	}

	return $html;
}


