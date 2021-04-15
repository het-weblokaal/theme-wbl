<?php
/**
 * Theme setup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Page Title */
	add_filter( 'page_title', __NAMESPACE__ . '\manage_page_title' );

}, 5 );

/**
 * Manage the Page Title
 *
 * @return string
 */
function manage_page_title( $page_title ) {

	if ( is_singular('wbl_event') ) {
		$page_title = Template::render( 'components/meta-agenda-date-calendar' ) . $page_title;
	}

	return $page_title;
}
