<?php
/**
 * Theme block functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'editor-styles' );

	/* Colors */
	add_theme_support( 'editor-color-palette', [
		[
			'name' => __( 'Primary Color', 'theme-wbl' ),
			'slug' => 'primary-1',
			'color' => '#FFF7D6' //'#fff5cc',
		],
		[
			'name' => __( 'Secondary Color', 'theme-wbl' ),
			'slug' => 'secondary-1',
			'color' => '#000000',
		]
	] );

	/* Alignment */
	add_theme_support( 'align-wide' );

	/* Disable colors */
	add_theme_support( 'disable-custom-colors' );

	/* Disable font-sizes */
	add_theme_support( 'disable-custom-font-sizes' );

	/* Disable gradients */
	add_theme_support( 'disable-custom-gradients' );

	/* Disable font-sizes */
	add_theme_support( 'editor-font-sizes' );

	/* Disable gradients */
	add_theme_support( 'editor-gradient-presets' );

	/* Custom Spacing (Experimental) */
	// add_theme_support( 'experimental-custom-spacing' );

	/* Core Block Patterns */
	remove_theme_support( 'core-block-patterns' );

	/* Show gutenberg on page_for_posts page (blog/home) */
	add_filter( 'replace_editor', __NAMESPACE__ . '\enable_gutenberg_editor_for_blog_page', 10, 2 );

}, 5 );


/**
 * Simulate non-empty content to enable Gutenberg editor
 *
 * @link   https://wordpress.stackexchange.com/a/350563/133100
 * @param  bool    $replace Whether to replace the editor.
 * @param  WP_Post $post    Post object.
 * @return bool
 */
function enable_gutenberg_editor_for_blog_page( $replace, $post ) {

    if ( ! $replace && absint( get_option( 'page_for_posts' ) ) === $post->ID && empty( $post->post_content ) ) {
        # This comment will be removed by Gutenberg since it won't parse into block.
        $post->post_content = '<!--non-empty-content-->';
    }

    return $replace;

}
