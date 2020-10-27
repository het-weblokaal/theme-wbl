<?php
/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities based on theme dev, particularly working
 * with child theme devs/users, over the years. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   HWL\WBL
 * @author    Erik Joling <erik.info@hetweblokaal.nl>
 * @copyright 2020 Het Weblokaal
 * @link      https://www.hetweblokaal.nl/
 */

namespace Theme_WBL;

/**
 * Set up theme functionality like textdomain, logo and filters
 */
add_action( 'after_setup_theme', function() {


	/* ==========================
	 * Cleanup
	 * ========================== */

	remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 ); // remove REST API link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove Oembed links which allow the site to be embedded in other sites
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove Shortlink meta
	add_action( 'init', function() { wp_deregister_script( 'wp-embed' ); } ); // Oembed: Remove javascript which is used to embed other sites in a page


	/* ==========================
	 * Site meta
	 * ========================== */

	// Viewport and charset
	add_action( 'wp_head', __NAMESPACE__ . '\display_meta_charset',   0 );
	add_action( 'wp_head', __NAMESPACE__ . '\display_meta_viewport',  1 );


	/* ==========================
	 * Scripts and styles
	 * ========================== */

	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\manage_frontend_scripts_and_styles' ); // Frontend only.
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\manage_block_editor_scripts_and_styles' ); // Backend block editor only.
	// add_action( 'enqueue_block_assets', ''); // Both frontend and backend...


	/* ==========================
	 * Block Editor
	 * ========================== */

	// Custom editor color palette
	add_filter( 'wbl/add-theme-support/editor-color-palette', __NAMESPACE__ . '\custom_editor_color_palette', 10, 1 );

	// Disallow blocks.
	add_filter( 'wbl-blocks/extra_blocks', 	 __NAMESPACE__ . '\extra_blocks', 10, 2 );
	add_filter( 'wbl-blocks/disallowed_blocks', __NAMESPACE__ . '\disallow_blocks', 10, 2 );
	add_filter( 'allowed_block_types', 				 __NAMESPACE__ . '\allowed_block_types', 10, 2 );

	// Fire up the blocks
	require_once( App::get_file_path( 'resources/blocks/init.php' ) );


	/* ==========================
	 * Body Class...
	 * ========================== */
	add_filter( 'body_class', __NAMESPACE__ . '\body_class' );


	/* ==========================
	 * Site Navigation
	 * ========================== */

	add_filter( 'nav_menu_css_class',         __NAMESPACE__ . '\nav_menu_css_class',         5, 2 );
	add_filter( 'nav_menu_item_id',           __NAMESPACE__ . '\nav_menu_item_id',           5    );
	add_filter( 'nav_menu_submenu_css_class', __NAMESPACE__ . '\nav_menu_submenu_css_class', 5    );
	add_filter( 'nav_menu_link_attributes',   __NAMESPACE__ . '\nav_menu_link_attributes',   5    );


	/* ==========================
	 * Other
	 * ========================== */
	add_filter( 'post_class', __NAMESPACE__ . '\post_class' );
	add_filter( 'excerpt_more',   __NAMESPACE__ . '\edit_excerpt_link' ); // Remove link from excerpt
	add_filter( 'excerpt_length', __NAMESPACE__ . '\excerpt_length' );

	// Autop converts linebreaks to <br/> and <p>'s
	// remove_filter( 'the_content', 'wpautop' );

	// Show gutenberg on page_for_posts page (blog/home)
	add_filter( 'replace_editor', __NAMESPACE__ . '\enable_gutenberg_editor_for_blog_page', 10, 2 );

	/* ==========================
	 * Customizer
	 * ========================== */

	// Add options to the theme customizer. (kirki hook = init)
	// add_action( 'init', __NAMESPACE__ . '\kirki_customize_register' );

	/* ==========================
	 * WBL Blocks
	 * ========================== */

	/** Override plugin templates */
	add_filter( 'wbl-blocks/posts/templates/directory', function( $directory ) {
    	return View::get_dir() . 'components';
	} );

	/* ==========================
	 * Comments
	 * ========================== */
	add_filter( 'comments_template', __NAMESPACE__ . '\comments_template' );


	/* ==========================
	 * Password Protection
	 * ========================== */

	add_filter( 'protected_title_format', __NAMESPACE__ . '\edit_password_protected_title' ); # Edit prefix of protected post titles
	add_filter( 'the_password_form',      __NAMESPACE__ . '\the_password_form' ); # Customize password protection form

	/** Don't show post_thumbnail on password protected pages */
	add_filter( 'has_post_thumbnail', function( $has_thumbnail, $post, $thumbnail_id ) {

    	// Prevent showing description on password protected pages
		if ( post_password_required( $post ) ) {
			$has_thumbnail = false;
		}

		return $has_thumbnail;

	}, 10, 3 );

	/* ==========================
	 * Theme specific
	 * ========================== */

	// Register the required plugins for this theme.
	add_action( 'tgmpa_register', [ __NAMESPACE__ . '\ThemeDependencies', 'setup' ] );

	// Add theme support
	ThemeSupport::setup();

	// Filter theme post templates to add registered templates.
	add_filter( 'theme_templates', __NAMESPACE__ . '\post_templates', 5, 4 );

	// Filter the custom logo to not lazy-load
	add_filter( 'get_custom_logo_image_attributes', __NAMESPACE__ . '\disable_logo_lazy_load' );


}, 5 );

/**
 * Init hook setups like image-sizes and menus
 */
add_action( 'init', function() {

	// Register site navigation
	register_nav_menus( [
		'site-nav'     => esc_html_x( 'Website navigation', 'nav menu location' ),
	] );

	// Register custom image sizes.
	// add_image_size( 'header_image', 200, 240, true );

	// Make custom image sizes available to the block editor
	// add_filter( 'image_size_names_choose', function( $sizes ) {
	// 	$sizes = array_merge( $sizes, [ 'partner_logo' => __('Partner Logo') ] );

	// 	return $sizes;
	// });

}, 5 );

/**
 * Filter used on `theme_templates` to add custom templates to the template
 * drop-down.
 *
 * Note that this method is `public` because of WP's hook callback
 * system. See the implemented contract for publicly-available methods.
 *
 * @param  array   $templates
 * @param  object  $theme
 * @param  object  $post
 * @param  string  $post_type
 * @return array
 */
function post_templates( $templates, $theme, $post, $post_type ) {

	// App::log('post_templates');

	$templates['template-landing-page.php'] = 'Landing Page';

	// App::log($templates);

	return $templates;
}
