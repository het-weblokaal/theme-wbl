<?php
namespace WBL\Theme;


/**
 * Transform array to HTML attributes
 *
 * Example ['lang' => 'nl'] becomes lang="nl"
 *
 * @param 	array
 * @return 	string
 */
function html_attributes( $attr ) {
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
 * Transform array to HTML classes
 *
 * Example ['class-1', 'class-2'] becomes "class-1 class-2"
 *
 * @param array $classes
 * @param bool  $show_class_attribute
 * @return string
 */
function html_classes( $classes, $show_class_attribute = false ) {

	$html = esc_attr( implode( ' ', $classes ) );
	$html = trim( $html );

	return ($show_class_attribute) ? "class=\"$html\"": $html;
}

/**
 * Add class based on check
 */
function maybe_add_class( $class, $check = false ) {
	return ($check) ? $class : '';
}

/**
 * Get post type archive page
 *
 * @return string or false
 */
function get_post_type_archive_page( $post_type = null ) {
	$post_id = false;
	$post_type = ($post_type) ? $post_type : get_post_type();

	if ($post_type == 'post') {
		$post_id = get_option( 'page_for_posts', false );
	}

	$post_id = apply_filters( 'post_type_archive_page', $post_id, $post_type );

	return $post_id;
}

/**
 * Get post type archive url
 *
 * @return string or false
 */
function get_post_type_archive_url( $post_type = null ) {
	$url = false;
	$post_type = ($post_type) ? $post_type : get_post_type();

	if ($post_id = get_post_type_archive_page( $post_type )) {
		$url = get_permalink($post_id);
	}
	else {
		if ($post_type == 'post') {
			$url = get_home_url();
		}
	}

	$url = apply_filters( 'post_type_archive_url', $url, $post_type );

	return $url;
}

/**
 * Get post type archive title
 *
 * @return string or false
 */
function get_post_type_archive_title( $post_type = null ) {
	$title = false;
	$post_type = ($post_type) ? $post_type : get_post_type();

	if ($post_id = get_post_type_archive_page( $post_type )) {
		$title = get_the_title($post_id);
	}
	else {
		if ($post_type == 'post') {
			$title = 'Blog';
		}
	}

	$title = apply_filters( 'post_type_archive_title', $title, $post_type );

	return $title;
}

/**
 * Get archive post type
 *
 * If there are zero results (or other parameters) in the archive query, get_post_type() isn't reliable for knowing
 * what the archive's post type is. This function gets the post type from the global $wp_query object instead.
 *
 * @link https://wordpress.stackexchange.com/a/377345/133100
 *
 * @return string or false
 */
function get_post_type_on_archive() {

	$post_type = false;

	if ( is_home() || is_archive() ) {

		$post_type = get_post_type();

		# There is no post_type when there are zero results in archive query
		if ( !$post_type ) {

    		# Try to get post type form wp_query object
    		$post_type = $GLOBALS['wp_query']->query['post_type'] ?? $post_type;
		}
	}

    return $post_type;
}
