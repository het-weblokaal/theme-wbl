<?php
/**
 * Theme setup functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	# Inform WordPress of custom language directory
	load_theme_textdomain( 'clc', App::file_path( App::get_lang_dir() ) );

	# Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	# HTML5 Support
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

	# Featured image support for all post types
	add_theme_support( 'post-thumbnails' );

	# Body Class
	add_filter( 'body_class', __NAMESPACE__ . '\body_class' );

	# Add button icon
	add_filter( 'render_block', __NAMESPACE__ . '\add_button_icon', 10, 2 );

	# Prevent empty paragraphs from being added to shortcode
	// remove_filter( 'the_content', 'wpautop' );
	// add_filter( 'the_content', 'shortcode_unautop' );

	// add_filter( 'wpcf7_load_css', '__return_false' );


	# Fix block-editor bug. Enables the orderby=menu_order for wbl_events and wbl_projects
	add_filter( 'rest_wbl_event_collection_params', __NAMESPACE__ . '\filter_add_rest_orderby_params', 10, 1 );
	add_filter( 'rest_wbl_project_collection_params', __NAMESPACE__ . '\filter_add_rest_orderby_params', 10, 1 );

	// Remove old theme_mods
	// remove_theme_mod('site_footer_content_1');
	// remove_theme_mod('site_footer_content_2');
	// remove_theme_mod('clc_footer_content_1');
	// remove_theme_mod('clc_footer_content_2');
	// remove_theme_mod('site-footer-menu-2');
	// remove_theme_mod('site-footer-menu-1');
	// remove_theme_mod('clc_newsletter_active');
	// remove_theme_mod('clc_newsletter_heading');
	// remove_theme_mod('clc_newsletter_content');
	// remove_theme_mod('clc_newsletter_button_text');
	// remove_theme_mod('clc_newsletter_link');

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

	if ( App::is_debug_mode() ) {
		$classes[] = 'is-development';

		if ( App::is_local_environment() ) {
			$classes[] = 'is-development--local';
		}
		else {
			$classes[] = 'is-development--online';
		}
	}

	return array_map( 'esc_attr', $classes );
}

/**
 * Add icon SVG to button block
 */
function add_button_icon( $block_content, $block ) {

	if ( $block['blockName'] === 'core/button' ) {

		# <div class="wp-block-button is-style-button-link"><a class="wp-block-button__link" href="http://climate-campus.test/meedoen/">Doe mee</a></div>

		# Setup regular expression
		# See https://www.phpliveregex.com/#tab-preg-replace
		// $regex_pattern = '/(is-style-button-link.*><a.*>.*)(<\/a>)/U';
		// $regex_replace = '$1 ' . App::svg('angle-right') . '$2';

		// # Search and replace
		// $block_content = preg_replace( $regex_pattern, $regex_replace, $block_content );
    }

    return $block_content;
}


/**
 * Add menu_order to the list of permitted orderby values
 *
 * Fixes an error in the block editor. `rest_invalid_param` orderby
 *
 * @link https://www.timrosswebdevelopment.com/wordpress-rest-api-post-order/
 */
function filter_add_rest_orderby_params( $params ) {
	$params['orderby']['enum'][] = 'menu_order';
	return $params;
}