<?php
/**
 * Theme block functions.
 */

namespace ClimateCampus;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/**
	 * Theme Support
	 */

	add_theme_support( 'editor-styles' );

	/* Colors */
	add_theme_support( 'editor-color-palette', [] );

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

	/**
	 * Blocks
	 */

	# Setup allowed blocks
	add_filter( 'allowed_block_types', __NAMESPACE__ . '\setup_allowed_blocks', 10, 2 );

	# Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	/**
	 * Block patterns
	 */

	# Setup block pattern category
	register_block_pattern_category( App::get_id(), [ 'label' => App::get_name() ], 'Theme category' );


	# Setup block patterns
	register_block_pattern( App::get_id() . "/hero", require App::template_path( 'block-patterns/hero.php' ) );

	/**
	 * Other
	 */

	// Show gutenberg on page_for_posts page (blog/home)
	add_filter( 'replace_editor', __NAMESPACE__ . '\enable_gutenberg_editor_for_blog_page', 10, 2 );

	/**
	 * Assets
	 */

	/* Add editor style */
	add_editor_style( App::asset( 'css/editor-style.css' ) );
	// remove_editor_styles();

	# Load blocks in editor
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\manage_block_editor_assets' );

	# Remove block directory (installation of new blocks through the editor)
	remove_action( 'enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets' );
	remove_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory' );

}, 5 );

/**
 * Get the allowed blocks (used by filter)
 */
function setup_allowed_blocks( $allowed_blocks, $post ) {

	# Get from config
	$blocks = App::config( 'blocks' );

	# Allow all blocks if no blocks are specified
    return ($blocks) ? $blocks : true;
}

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

/**
 * Creating a new block category.
 *
 * @param   array $categories     List of block categories.
 * @return  array
 */
function register_block_category( $categories ) {

    # The block category title and slug.
    $block_category = [
		'title' => App::get_name(),
		'slug' => App::get_id(),
		'icon'  => 'star-filled'
    ];

    $category_slugs = wp_list_pluck( $categories, 'slug' );

    if ( ! in_array( $block_category['slug'], $category_slugs, true ) ) {
        $categories = array_merge( $categories, [ $block_category ] );
    }

    return $categories;
}

/**
 * Enqueue Gutenberg block assets for backend editor.
 */
function manage_block_editor_assets() {

	# Remove core editor google font
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );

	# Add script to cleanup unwanted functionality
	wp_enqueue_script( App::handle('block-editor'), App::asset( 'js/block-editor.js' ), [ 'wp-blocks', 'wp-i18n', 'wp-data', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks' ] );

	# Add the themes editor styles to the editor
	# wp_enqueue_style( App::handle('editor'), App::asset( 'css/editor-style.css' ), null, null );

	# Add global color inline style
	enqueue_global_color_inline_style();

	# Scripts.
	wp_enqueue_script(
		App::handle('blocks'),
		App::asset( 'js/blocks.js' ),
		[
			'lodash',
			'wp-blocks',
			'wp-components',
			'wp-data',
			'wp-editor',
			'wp-element',
			'wp-i18n',
		],
		null,
		true // Enqueue the script in the footer.
	);

	# Styles
	# By depending on frontend-style the editor style is later in the cascade
	wp_enqueue_style(
		App::handle('blocks'),
		App::asset( 'css/blocks.editor.css' ),
		array( 'wp-edit-blocks', 'wbl-blocks' )
	);
}

/**
 * Load dynamic blocks
 *
 * @param array $blocks  with string of block names (directory name)
 */
function load_dynamic_blocks( $blocks = [] ) {

	// # Load block index files to kick-off block
	// array_map( function( $block ) {
	// 	require_once( App::src_path( "blocks/{$block}/index.php" ) );
	// }, $blocks );
}
