<?php

/**
 * Prevent direct access to file
 *
 * @source https://github.com/Yoast/wordpress-seo/blob/trunk/wp-seo.php
 */
if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

// Kickstart
// \Theme_WBL\App::display_template( 'index' );

?>
