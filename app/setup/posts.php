<?php
/**
 * Theme setup functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Page content for posts archive */
	add_filter( 'get_the_archive_description', __NAMESPACE__ . '\posts_archive_content' );

}, 5 );


/**
 *
 */
function posts_archive_content( $content ) {

	if (is_home()) {
		if ( $post_id = get_option( 'page_for_posts' ) ) {
			$content = get_post_field( 'post_content', $post_id );
			$content = apply_filters( 'the_content', $content );
		}
	}

	return $content;
}
