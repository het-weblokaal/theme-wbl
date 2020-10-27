<?php
namespace Theme_WBL;


/*****************************************************************
 * Site
 *****************************************************************/

/**
 * Adds the meta charset to the header.
 */
function display_meta_charset() {

	echo sprintf( '<meta charset="%s" />' . "\n", esc_attr( get_bloginfo( 'charset' ) ) );
}

/**
 * Adds the meta viewport to the header.
 */
function display_meta_viewport() {

	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

function render_site_logo( $args = [] ) {

	// Set defaults.
	$args = wp_parse_args( $args, [
		'class'	    => 'site-logo',
		'heading'   => false,
		'force_svg' => false,
	] );

	$has_custom_logo = false;

	if ($args['force_svg']) {
		$logo = Utils::svg('logo-hetweblokaal');
	}
	else {
		// Get custom logo
		$logo = get_custom_logo();
		$has_custom_logo = true;
	}

	// Fallback to textlogo
	$logo = $logo ? $logo : get_bloginfo( 'name' );

	// Wrap logo
	if ( ! $has_custom_logo ) {

		// Wrap textlogo in link or span
		if ( is_front_page() ) {
			$logo = sprintf( '<span class="%s">%s</span>',
				"{$args['class']}__link",
				$logo
			);
		}
		else {
			$logo = sprintf( '<a class="%s" href="%s" rel="home">%s</a>',
				"{$args['class']}__link",
				site_url(),
				$logo
			);
		}
	}

	// Wrap in heading
	if ($args['heading']) {
		$logo = sprintf( '<h1 class="%s">%s</h1>',
			"{$args['class']}__title",
			$logo
		);
	}

	return sprintf('<div class="%s">%s</div>', $args['class'], $logo);
}

function display_site_logo( $args = [] ) {
	echo render_site_logo( $args );
}


/**
 * Returns the post terms HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_categories( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		// Translators: Separates tags, categories, etc. when displaying a post.
		'sep'      => _x( ', ', 'taxonomy terms separator', 'theme-wbl' ),
	] );

	$terms = get_the_terms( get_the_ID(), 'category' );

	if ( is_wp_error( $terms ) ) { return $terms; }
	if ( empty( $terms ) ) { return false; }

	$links = array();

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, 'category' );
		if ( is_wp_error( $link ) ) {
			return $link;
		}
		$links[] = '<a href="' . esc_url( $link ) . '" rel="tag">#' . $term->name . '</a>';
	}

	/**
	 * Apply the expected WordPress filter.
	 */
	$term_links = apply_filters( "term_links-category", $links );

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
		$date = 'Vandaag';
	}
	elseif ($date == wp_date( $settings_date_format, strtotime("-1 days") ) ) {
		$date = 'Gisteren';
	}
	elseif ($date == wp_date( $settings_date_format, strtotime("-2 days") ) ||
		    $date == wp_date( $settings_date_format, strtotime("-3 days") ) ||
		    $date == wp_date( $settings_date_format, strtotime("-4 days") ) ) {
		$date = 'Afgelopen ' . get_the_date( 'l' );
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
 * Returns the post featured image
 *
 * @param  array  $args
 * @return string
 */
function render_featured_image( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'size' => 'thumbnail',
		'class' => ''
	] );

    $image_id = has_post_thumbnail() ? get_post_thumbnail_id() : false;

    if ($image_id) {
	    $html = \wp_get_attachment_image( $image_id, $args['size'], false, ['class' => $args['class']] );
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
		$html = '<span class="password-protection-status">'. Utils::svg('lock-alt') .'</span>';
	}
	elseif ($status == 'opened') {
		$html = '<span class="password-protection-status">'. Utils::svg('lock-open-alt') .'</span>';
	}

	return $html;
}

