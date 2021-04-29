<?php
/**
 * Theme setup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// HTML5 Support
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

	// Featured image support for all post types
	add_theme_support( 'post-thumbnails' );

	// Body Class
	add_filter( 'body_class', 'WBL\Theme\body_class' );

	/**
	 * Cleanup
	 */
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 ); // remove REST API link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove Oembed links which allow the site to be embedded in other sites
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove Shortlink meta
	add_action( 'init', function() { wp_deregister_script( 'wp-embed' ); } ); // Oembed: Remove javascript which is used to embed other sites in a page

	/**
	 * HTML HEAD
	 */
	add_action( 'wp_head', 'WBL\Theme\display_meta_charset',   0 );
	add_action( 'wp_head', 'WBL\Theme\display_meta_viewport',  1 );
	add_theme_support( 'title-tag' );

	/**
	 * Page Template
	 */
	add_filter( 'theme_templates', __NAMESPACE__ . '\custom_templates', 10, 4 );

	/**
	 * Navigation
	 */
	add_filter( 'nav_menu_css_class',         __NAMESPACE__ . '\nav_menu_css_class',         5, 2 );
	add_filter( 'nav_menu_item_id',           __NAMESPACE__ . '\nav_menu_item_id',           5    );
	add_filter( 'nav_menu_submenu_css_class', __NAMESPACE__ . '\nav_menu_submenu_css_class', 5    );
	add_filter( 'nav_menu_link_attributes',   __NAMESPACE__ . '\nav_menu_link_attributes',   5    );

}, 5 );

/**
 * Init hook menus
 */
add_action( 'init', function() {

	// Register site navigation
	register_nav_menus( [
		'site-nav'     => esc_html_x( 'Website navigation', 'nav menu location' ),
	] );

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
 * Filter used on `theme_templates` to add custom templates to the template
 * drop-down.
 *
 * @param  array   $templates
 * @param  object  $theme
 * @param  object  $post
 * @param  string  $post_type
 * @return array
 */
function custom_templates( $templates, $theme, $post, $post_type ) {

	$templates['landing-page'] = 'Landing Page';

	return $templates;
}


/**
 * Simplifies the nav menu class system.
 *
 * @param  array   $classes
 * @param  object  $item
 * @return array
 */
function nav_menu_css_class( $classes, $item ) {

	$new_classes = [ 'menu__item' ];

	// On 404 pages don't add current, ancestor relation in menu
	// Because 404 pages think they belong to the blog index page...
	if ( ! \is_404() ) {

		foreach ( [ 'item', 'parent', 'ancestor' ] as $type ) {

			if ( in_array( "current-menu-{$type}", $classes ) || in_array( "current_page_{$type}", $classes ) ) {

				$new_classes[] = 'item' === $type ? 'menu__item--current' : "menu__item--{$type}";
			}
		}

		$new_classes = apply_filters( 'wbl_nav_menu_css_class', $new_classes, $item );
	}

	// Add a class if the menu item has children.
	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$new_classes[] = 'has-children';
	}

	// Add custom user-added classes if we have any.
	$custom_classes = \get_post_meta( $item->ID, '_menu_item_classes', true );

	if ( $custom_classes ) {
		$new_classes = array_merge( $new_classes, (array) $custom_classes );
	}

	return $new_classes;
}


/**
 * Simplifies the nav menu class system.
 *
 * @param string $item_id
 * @return string
 */
function nav_menu_item_id( $item_id ) {
	$item_id = '';

	return $item_id;
}

/**
 * Adds a custom class to the nav menu link.
 *
 * @param  array   $attr;
 * @return array
 */
function nav_menu_link_attributes( $attr ) {

	$attr['class'] = 'menu__link';

	return $attr;
}

/**
 * Adds a custom class to the submenus in nav menus.
 *
 * @param  array   $classes
 * @return array
 */
function nav_menu_submenu_css_class( $classes ) {

	$classes = [ 'menu__sub-menu' ];

	return $classes;
}
