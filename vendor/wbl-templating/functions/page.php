<?php

/**
 * Page template functions
 *
 * Things title, featured image
 */

namespace ClimateCampus;


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
		$page_title = App::config('site-content', 'search', 'title' );
	}

	elseif ( \is_404() ) {
		$page_title = App::config('site-content', '404', 'title' );
	}

	elseif (is_home()) {

		if (is_front_page()) {
			$page_title = 'Home';
		}
		else {
			$page_title = get_the_title(get_queried_object_id());
		}
	}

	elseif ( \is_post_type_archive() ) {
		$page_title = post_type_archive_title( '', false );
	}

	elseif ( \is_tax() || \is_category() || \is_tag() ) {
		$page_title = get_the_archive_title();
		// $page_title = single_term_title( '', false );
	}

	elseif ( \is_author() ) {
		$page_title = get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
	}

	return apply_filters( 'page_title', $page_title );
}

// function get_page_data( $type ) {

// 	$page_data = '';

// 	if ( \is_singular() ) {

// 		if ($type == 'title') {
// 			$page_data = get_the_title(get_queried_object_id());
// 		}
// 	}

// 	elseif ( \is_search() ) {

// 		if ($type == 'title') {
// 			$page_data = App::config('site-content', 'search', 'title' );
// 		}
// 	}

// 	elseif ( \is_404() ) {
// 		if ($type == 'title') {
// 			$page_data = App::config('site-content', '404', 'title' );
// 		}
// 	}

// 	elseif (is_home()) {

// 		if (is_front_page()) {
// 			if ($type == 'title') {
// 				$page_data = 'Home';
// 			}
// 		}
// 		else {
// 			if ($type == 'title') {
// 				$page_data = get_the_title(get_queried_object_id());
// 			}
// 		}
// 	}

// 	elseif ( \is_tax() || \is_category() || \is_tag() ) {
// 		if ($type == 'title') {
// 			$page_data = get_the_archive_title();
// 			// $page_data = single_term_title( '', false );
// 		}
// 	}

// 	elseif ( \is_post_type_archive() ) {
// 		if ($type == 'title') {
// 			$page_data = post_type_archive_title( '', false );
// 		}
// 	}

// 	elseif ( \is_author() ) {
// 		if ($type == 'title') {
// 			$page_data = get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
// 		}
// 	}

// 	$page_data = apply_filters( "page_data_{$type}", $page_data );
// 	$page_data = apply_filters( 'page_data', $page_data );

// 	return $page_data;
// }
