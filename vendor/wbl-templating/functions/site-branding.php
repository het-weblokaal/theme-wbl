<?php
/**
 * Site Logo template functions
 *
 * Just the site logo :)
 */

namespace ClimateCampus;


/**
 * Render Site Logo
 *
 * @param array $args
 */
function render_site_branding( $args = [] ) {

	// Setup arguments.
	$args = wp_parse_args( $args, [
		'class'	    => 'site-branding',
		'heading'   => false
	] );

	// Setup with logo
	$output = get_site_logo();

	// Wrap in link or span
	if ( is_front_page() ) {

		$output = sprintf( '<span class="%s">%s</span>',
			"{$args['class']}__link {$args['class']}__link--no-link",
			$output
		);
	}
	else {

		$output = sprintf( '<a class="%s" href="%s" rel="home">%s</a>',
			"{$args['class']}__link",
			home_url(),
			$output
		);
	}

	// Maybe wrap in heading
	if ($args['heading']) {

		$output = sprintf( '<h1 class="%s">%s</h1>',
			"{$args['class']}__title",
			$output
		);
	}

	// Wrap in div
	$output = sprintf('<div class="%s">%s</div>', $args['class'], $output);

	return $output;
}

function display_site_branding( $args = [] ) {
	echo render_site_branding( $args );
}

/**
 * Get the site logo (theme, custom-logo or text fallback)
 *
 * @return string
 */
function get_site_logo() {
	$logo = '';

	// Try to get logo from site config
	$theme_logo = App::config( 'site-content', 'site-logo' );

	if ($theme_logo) {

		// Setup theme logo
		$logo = "<img class=\"site-logo\" src=\"{$theme_logo}\" alt=\"Logo Climate Campus\" />";
	}

	elseif ( get_theme_support('custom-logo') ) {

		// Setup custom logo
		$logo = get_custom_logo();
	}

	// Fallback to textlogo
	$logo = $logo ?? get_bloginfo( 'name' );

	return $logo;
}
