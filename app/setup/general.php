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
	add_filter( 'body_class', __NAMESPACE__ . '\body_class' );

	# Add button icon
	add_filter( 'render_block', __NAMESPACE__ . '\add_button_icon', 10, 2 );

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

/**
 * Add icon SVG to button block
 */
function add_button_icon( $block_content, $block ) {

	if ( $block['blockName'] === 'core/button' ) {

		# <div class="wp-block-button is-style-button-link"><a class="wp-block-button__link" href="http://climate-campus.test/meedoen/">Doe mee</a></div>

		# Setup regular expression
		# See https://www.phpliveregex.com/#tab-preg-replace
		// $regex_pattern = '/(is-style-button-link.*><a.*>.*)(<\/a>)/U';
		// $regex_replace = '$1 ' . Theme::svg('angle-right') . '$2';

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