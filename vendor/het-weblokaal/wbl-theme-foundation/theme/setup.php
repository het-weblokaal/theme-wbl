<?php
namespace WBL\Theme;

/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// // Inform WordPress of custom language directory
	// load_theme_textdomain( 'wbl', Theme::get_file_path( Theme::get_lang_dir() ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// HTML5 Support
	add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

	// Featured image support for all post types
	add_theme_support( 'post-thumbnails' );

	// Head cleanup
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 ); // remove REST API link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // remove Oembed links which allow the site to be embedded in other sites
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // remove Shortlink meta
	add_action( 'init', function() { wp_deregister_script( 'wp-embed' ); } ); // Oembed: Remove javascript which is used to embed other sites in a page

	// Viewport and charset
	add_action( 'wp_head', 'WBL\Theme\display_meta_charset',   0 );
	add_action( 'wp_head', 'WBL\Theme\display_meta_viewport',  1 );

	// Filter theme post templates to add registered templates.
	add_filter( 'theme_templates', 'WBL\Theme\custom_templates', 10, 4 );

	// Register the required plugins for this theme.
	add_action( 'tgmpa_register', 'WBL\Theme\register_dependencies' );

	// Body Class
	add_filter( 'body_class', 'WBL\Theme\body_class' );

	// Menu Class
	add_filter( 'nav_menu_css_class',         'WBL\Theme\nav_menu_css_class',         5, 2 );
	add_filter( 'nav_menu_item_id',           'WBL\Theme\nav_menu_item_id',           5    );
	add_filter( 'nav_menu_submenu_css_class', 'WBL\Theme\nav_menu_submenu_css_class', 5    );
	add_filter( 'nav_menu_link_attributes',   'WBL\Theme\nav_menu_link_attributes',   5    );

	// Change entry classes
	add_filter( 'wbl/theme/template/data/entry/blog', 'WBL\Theme\extra_entry_classes' );

	// Excerpt
	add_filter( 'excerpt_more',    'WBL\Theme\edit_excerpt_more' ); // Remove link from excerpt

	// Show gutenberg on page_for_posts page (blog/home)
	add_filter( 'replace_editor', 'WBL\Theme\enable_block_editor_on_blog_page', 10, 2 );

	// Remove google fonts
	add_action( 'enqueue_block_editor_assets', 'WBL\Theme\remove_google_font' );

	// Remove block directory (installation of new blocks through the editor)
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );

	// Setup allowed blocks
	add_filter( 'allowed_block_types', 'WBL\Theme\allowed_block_types', 10, 2 );

	// Make theme data available in JS
	add_action( 'wp_footer',    'WBL\Theme\add_theme_data_script' );
	add_action( 'admin_footer', 'WBL\Theme\add_theme_data_script' );

	// Manage customizer panels and settings
	// add_action( 'customize_register', 'WBL\Theme\manage_customizer', 50 );

	// Password Protection
	add_filter( 'protected_title_format', 'WBL\Theme\password_protected_title_format' );
	add_filter( 'the_password_form',      'WBL\Theme\the_password_form' );

	// Don't show post_thumbnail on password protected pages 
	add_filter( 'has_post_thumbnail', 'WBL\Theme\password_protected_thumbnail', 10, 3 );


	// Set the classname of the language switcher in the navigation menu
	add_filter( 'nav_menu_css_class', 'WBL\Theme\add_polylang_menu_class', 9, 2 );

	// Improve archive description
	add_filter( 'get_the_archive_description', 'WBL\Theme\archive_description_filter' );


	// Page SEO Meta
	add_filter( 'slim_seo_meta_title',       'WBL\Theme\set_meta_title_for_blog'      );
	add_filter( 'slim_seo_meta_description', 'WBL\Theme\manage_page_meta_description' );

	// Breadcrumbs
	add_filter( 'slim_seo_breadcrumbs_links', 'WBL\Theme\manageslim_seo__breadcrumbs' );

}, 5 );


/**
 * Init hook menus
 */
add_action( 'init', function() {

	// Register site navigation
	register_nav_menus( [
		'site-nav'     => esc_html_x( 'Website navigation', 'nav menu location' ),
	] );

}, 5 );