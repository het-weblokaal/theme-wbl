<?php
namespace Theme_WBL;

/**
 * Render classes
 *
 * Example ['class-1', 'class-2'] becomes "class-1 class-2"
 *
 * @param array $classes
 * @param bool  $show_class_attribute
 * @return string
 */
function render_class( $classes, $show_class_attribute = true ) {
	$html = '';

	foreach ( $classes as $class ) {

		$esc_class = esc_html( $class );

		$html .= " $esc_class";
	}

	$html = trim( $html );

	return ($show_class_attribute) ? "class=\"$html\"": $html;
}

/**
 * Render attributes
 *
 * Example ['lang' => 'nl'] becomes lang="nl"
 *
 * @param 	array
 * @return 	string
 */
function render_attr( $attr ) {
	$html = '';

	foreach ( $attr as $name => $value ) {

		$esc_value = '';

		// If the value is a link `href`, use `esc_url()`.
		if ( $value !== false && 'href' === $name ) {
			$esc_value = esc_url( $value );

		} elseif ( $value !== false ) {
			$esc_value = esc_attr( $value );
		}

		$html .= false !== $value ? sprintf( ' %s="%s"', esc_html( $name ), $esc_value ) : esc_html( " {$name}" );
	}

	return trim( $html );
}

/**
 * Get HTML attributes
 */
function get_html_attr() {
	$attr = [];

	$parts = wp_kses_hair( get_language_attributes(), [ 'http', 'https' ] );

	if ( $parts ) {

		foreach ( $parts as $part ) {

			$attr[ $part['name'] ] = $part['value'];
		}
	}

	return $attr;
}

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

/**
 * Returns the post terms HTML.
 *
 * @param  array  $args
 * @return string
 */
function render_terms( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'taxonomy' => 'category',
		// Translators: Separates tags, categories, etc. when displaying a post.
		'sep'      => _x( ', ', 'taxonomy terms separator', 'theme-wbl' ),
	] );

	$html = get_the_term_list( get_the_ID(), $args['taxonomy'], '', $args['sep'], '' );

	return $html;
}

/**
 * Get password protection status of the current post
 *
 * @return string locked or opened | boolean false (not applicable)
 */
function get_password_protection_status() {
	global $post;

	$status = false;

	if ($post) {

		// Password-protected posts.
		if ( post_password_required( $post ) ) {
			$status = 'locked';
		} elseif ( $post->post_password ) {
			$status = 'opened';
		}
	}

	return $status;
}

/**
 * Get page title
 *
 * Note: we use `get_queried_object_id()` so we can get page title even inside other loops
 */
function get_page_title() {

	$page_title = '';

	if ( \is_singular() ) {
		$page_title = get_the_title(get_queried_object_id());
	}

	elseif ( \is_search() ) {
		$page_title = sprintf(   esc_html__( 'Search results for: %s', 'theme-wbl' ), get_search_query() );
	}

	elseif ( \is_404() ) {
		$page_title = Config::get('template-content', '404', 'title');
	}

	elseif (is_home()) {
		$page_title = get_the_title(get_queried_object_id());
	}

	elseif ( \is_tax() || \is_category() || \is_tag() ) {
		$page_title = get_the_archive_title();
		// $page_title = single_term_title( '', false );
	}

	elseif ( \is_post_type_archive() ) {
		$page_title = post_type_archive_title( '', false );
	}

	elseif ( \is_author() ) {
		$page_title = get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
	}

	return $page_title;
}
