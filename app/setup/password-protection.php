<?php
/**
 * Password protection functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// add_filter( 'protected_title_format', __NAMESPACE__ . '\password_protected_title_format' ); # Edit prefix of protected post titles
	add_filter( 'the_password_form',      __NAMESPACE__ . '\the_password_form' ); # Customize password protection form

	// Don't show post_thumbnail on password protected pages 
	add_filter( 'has_post_thumbnail', __NAMESPACE__ . '\password_protected_thumbnail', 10, 3 );

}, 5 );


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
 * Edit password protection title format
 */
function password_protected_title_format() {
	return '%s';
	// return '<span class="icon">' . App::svg('lock-alt') . '</span><span>%s</span>';
}

/**
 * Edit password protection form
 */
function the_password_form() {

	/**
	 * Remove auto-paragraphs and re-add them later
	 *
	 * See function do_blocks in /wp-includes/blocks.php for more information
	 */
	$priority = has_filter( 'the_content', 'wpautop' );
	if ( false !== $priority ) {
		remove_filter( 'the_content', 'wpautop', $priority );
		add_filter( 'the_content', '_restore_wpautop_hook', $priority + 1 );
	}

	return App::render_template( 'components/page-password-protection-form' );
}

/**
 * Edit thumbnail on password protected posts
 */
function password_protected_thumbnail( $has_thumbnail, $post, $thumbnail_id ) {

	// Prevent showing description on password protected pages
	if ( post_password_required( $post ) ) {
		$has_thumbnail = false;
	}

	return $has_thumbnail;

}

/**
 * Edit excerpt on password protected posts
 */
function edit_password_protected_excerpt( $excerpt ) {

	if ( $status = get_password_protection_status() ) {

		if ($status == 'locked') {
 			$excerpt = '<p>' . __('Voor dit bericht heb je een wachtwoord nodig.', 'clc') . '</p>';
 		}
	}

    return $excerpt;
}
