<?php
/**
 * Theme setup functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Page SEO Meta */
	add_filter( 'slim_seo_meta_title', 'WBL\Theme\set_meta_title_for_blog' );
	add_filter( 'slim_seo_meta_description', 'WBL\Theme\manage_page_meta_description' );

	/* Breadcrumbs */
	add_filter( 'slim_seo_breadcrumbs_links', 'WBL\Theme\manageslim_seo__breadcrumbs' );

}, 5 );

/**
 * Manage the Page Meta Title
 *
 * @return string
 */
function set_meta_title_for_blog( $meta_title ) {

	if ( is_home() && ! is_front_page() ) {

		// Set meta if we find an archive page
		if ( $post_id = get_option( 'page_for_posts' ) ) {
			$meta_description = get_slim_seo_meta( $post_id, 'description' );
		}
	}

	return $meta_title;
}

/**
 * Manage the Page Meta Description
 *
 * @return string
 */
function set_meta_description_for_blog( $meta_description ) {

	if ( is_home() && ! is_front_page() ) {

		// Set meta if we find an archive page
		if ( $post_id = get_option( 'page_for_posts' ) ) {
			$meta_description = get_slim_seo_meta( $post_id, 'description' );
		}
	}

	return $meta_description;
}

/**
 * Helper function for getting Slim SEO meta data
 *
 * @param int $post_id
 * @param string $meta_type (title or description)
 * @return string
 */
function get_slim_seo_meta( $post_id, $meta_type ) {
	$seo_meta = '';
	$seo_data = get_post_meta( $post_id, 'slim_seo', true );

	if ($meta_type == 'title') {
		$seo_meta = $seo_data['title'] ?? wp_get_document_title();
	}
	elseif ($meta_type == 'description') {
		$seo_meta = $seo_data['description'] ?? '';
	}

	return $seo_meta;
}

/**
 *
 */
function manage_slim_seo_breadcrumbs( $links ) {

	/* Don't show category in breadcrumbs */
	if (is_singular('post')) {
		array_pop($links);
	}

	if ( is_category() || is_tag() ) {

		if ( $posts_archive_page_id = get_option( 'page_for_posts' ) ) {
			$links[] = [
				'url' => get_permalink( $posts_archive_page_id ),
				'text' => get_the_title( $posts_archive_page_id ),
			];
		}
	}

	return $links;
}
