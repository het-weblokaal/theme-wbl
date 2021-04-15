<?php
/**
 * Theme menu functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	add_filter( 'nav_menu_css_class',         __NAMESPACE__ . '\nav_menu_css_class',         5, 2 );
	add_filter( 'nav_menu_item_id',           __NAMESPACE__ . '\nav_menu_item_id',           5    );
	add_filter( 'nav_menu_submenu_css_class', __NAMESPACE__ . '\nav_menu_submenu_css_class', 5    );
	add_filter( 'nav_menu_link_attributes',   __NAMESPACE__ . '\nav_menu_link_attributes',   5    );

	add_filter( 'clc_nav_menu_css_class', __NAMESPACE__ . '\fix_blog_nav_menu_class', 10, 2 );

	add_filter( 'wp_nav_menu_items', __NAMESPACE__ . '\add_icons_to_menus', 10, 2 );

}, 5 );

/**
 * Init hook menus
 */
add_action( 'init', function() {

	$nav_menus = App::config('site-content', 'nav_menus');

	if (!empty($nav_menus)) {

		// Register site navigation
		register_nav_menus( $nav_menus );
	}

}, 5 );

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

		$new_classes = apply_filters( 'clc_nav_menu_css_class', $new_classes, $item );
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


/**
 * Add svg icons to site navigation
 */
function add_icons_to_menus( $items, $args ) {

	/**
	 * Search icon
	 */

	# Setup regular expression
	# See https://www.phpliveregex.com/#tab-preg-replace
	$regex_pattern = '/(menu__item--search.*><a.*>)(.*)(<\/a>)/U';
	$regex_replace = '$1<span class="label">$2</span>' . App::svg('search') . '$3';

	# Search and replace
	$items = preg_replace( $regex_pattern, $regex_replace, $items );

	/**
	 * Children icon
	 *
	 * Only in `site-nav` menu's
	 */
	if ( strpos($args->theme_location, 'site-nav-desktop') !== false ) {

		# Setup regular expression
		# See https://www.phpliveregex.com/#tab-preg-replace
		$regex_pattern = '/(has-children.*><a.*>)(.*)(<\/a>)/U';
		$regex_replace = '$1<span class="label">$2</span>' . App::svg('angle-down') . '$3';

		# Search and replace
		$items = preg_replace( $regex_pattern, $regex_replace, $items );

	}

	return $items;
}


/**
 * Fix the issue where the blog-menu-item will be assigned as parent for custom post types
 */
function fix_blog_nav_menu_class( $classes, $item ) {

	# Check if the menu-item is the archive for posts
	if ( $item->object_id === get_post_type_archive_page( 'post' ) ) {

		# Do nothing if we're on a post page
		if ( is_home() || is_singular( 'post' ) ) {
			# Silence
		}

		# Try to remove active states from classes
		else {
			$classes = array_diff( $classes, [ "menu__item--current", "menu__item--parent", "menu__item--ancestor" ] );
		}
	}

	return $classes;
}
