<?php
/**
 * Menu template functions
 *
 * Things like menu and site-nav
 */

namespace WBL\Templating;


/**
 * Get menu_name by location
 */
function get_menu_name_by_location( $location ) {
	$locations = get_nav_menu_locations();

	$menu = isset( $locations[ $location ] ) ? wp_get_nav_menu_object( $locations[ $location ] ) : '';

	return $menu->name ?? '';
}

/**
 * Get menu id by location
 */
function get_menu_id_by_location( $location ) {
	$locations = get_nav_menu_locations();

	$menu = isset( $locations[ $location ] ) ? wp_get_nav_menu_object( $locations[ $location ] ) : '';

	return $menu->term_id ?? false;
}
