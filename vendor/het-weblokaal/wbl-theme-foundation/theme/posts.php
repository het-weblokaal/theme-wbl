<?php
/**
 * Theme setup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Improve archive description
	add_filter( 'get_the_archive_description', 'WBL\Theme\archive_description_filter' );

}, 5 );


function archive_description_filter( $desc ) {

	$new_desc = '';

	if ( is_home() && ! is_front_page() ) {
		$new_desc = get_post_field( 'post_content', get_queried_object_id(), 'raw' );

	} elseif ( is_category() ) {
		$new_desc = get_term_field( 'description', get_queried_object_id(), 'category', 'raw' );

	} elseif ( is_tag() ) {
		$new_desc = get_term_field( 'description', get_queried_object_id(), 'post_tag', 'raw' );

	} elseif ( is_tax() ) {
		$new_desc = get_term_field( 'description', get_queried_object_id(), get_query_var( 'taxonomy' ), 'raw' );

	} elseif ( is_author() ) {
		$new_desc = get_the_author_meta( 'description', get_query_var( 'author' ) );

	} elseif ( is_post_type_archive() ) {
		$new_desc = get_the_post_type_description();
	}

	return $new_desc ?: $desc;
}