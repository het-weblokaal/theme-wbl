<?php
/**
 * Theme setup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	# Inform WordPress of custom language directory
	load_theme_textdomain( 'wbl', Theme::get_file_path( Theme::get_lang_dir() ) );

	# Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	# HTML5 Support
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

	# Featured image support for all post types
	add_theme_support( 'post-thumbnails' );

	# Body Class
	add_filter( 'body_class', 'WBL\Theme\body_class' );

}, 5 );

/**
 * Returns the body classes.
 *
 * @return string
 */
function body_class( $classes ) {

	// Reset..
	$classes = [];

	if ( \is_singular() ) {
		$classes[] = 'is-singular';
		$classes[] = 'is-singular--' . \get_post_type();

		if ($status = get_password_protection_status()) {
			$classes[] = 'is-password-protected';
			$classes[] = "is-password-protected--$status";
		}

		if (\is_front_page()) {
			$classes[] = 'is-front-page';
		}

		// Check for custom template
		if ($template = get_page_template_slug()) {

			// Normalizes template name
			$template = str_replace( [ 'template-', 'tmpl-' ], '', basename( $template, '.php' ) );

			$classes[] = "is-template";
			$classes[] = "is-template--{$template}";
		}
	}
	elseif ( \is_archive() || \is_home() ) {
		$classes[] = 'is-archive';
		$classes[] = 'is-archive--' . \get_post_type();
	}
	elseif ( \is_404() ) {
		$classes[] = 'is-404';
	}
	elseif ( \is_search() ) {
		$classes[] = 'is-search';
	}

	if ( \is_admin_bar_showing() ) {
		$classes[] = 'has-admin-bar';
	}

	if ( Theme::is_debug_mode() ) {
		$classes[] = 'is-development';

		if ( Theme::is_local_environment() ) {
			$classes[] = 'is-development--local';
		}
		else {
			$classes[] = 'is-development--online';
		}
	}

	return array_map( 'esc_attr', $classes );
}

