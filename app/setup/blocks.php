<?php
/**
 * Setup blocks, categories and patterns.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Setup allowed blocks
	add_filter( 'allowed_block_types', __NAMESPACE__ . '\allowed_block_types', 10, 2 );

	// Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	// Setup block pattern category
	register_block_pattern_category( Theme::get_id(), [ 'label' => Theme::get_name() ], 'Theme category' );

	// Setup block patterns
	// register_block_pattern( Theme::get_id() . "/hero", require Theme::template_path( 'block-patterns/hero.php' ) );

}, 5 );

/**
 * Get the allowed blocks (used by filter)
 */
function allowed_block_types( $allowed_blocks, $post ) {

	$allowed_blocks = [
		// 'core/archives',
		// 'core/audio',
		// 'core/block',
		'core/button',
		'core/buttons',
		// 'core/calendar',
		// 'core/categories',
		// 'core/classic',
		// 'core/code',
		'core/column',
		'core/columns',
		'core/cover',
		'core/embed',
		// 'core-embed/youtube',
		'core/file',
		// 'core/gallery',
		'core/group',
		'core/heading',
		'core/html',
		'core/image',
		// 'core/latest-comments',
		// 'core/latest-posts',
		// 'core/legacy-widget',
		'core/list',
		// 'core/media-text',
		// 'core/missing',
		// 'core/more',
		// 'core/navigation-link',
		// 'core/navigation',
		// 'core/nextpage',
		'core/paragraph',
		// 'core/post-author',
		// 'core/post-comments-count',
		// 'core/post-comments-form',
		// 'core/post-comments',
		// 'core/post-content',
		// 'core/post-date',
		// 'core/post-excerpt',
		// 'core/post-featured-image',
		// 'core/post-tags',
		// 'core/post-title',
		// 'core/preformatted',
		'core/pullquote',
		// 'core/query-loop',
		// 'core/query-pagination',
		// 'core/query',
		'core/quote',
		// 'core/rss',
		// 'core/search',
		// -- 'core/separator',
		// 'core/shortcode',
		// 'core/site-logo',
		// 'core/site-tagline',
		// 'core/site-title',
		// 'core/social-link',
		// 'core/social-links',
		// 'core/spacer',
		// 'core/subhead',
		'core/table',
		// 'core/tag-cloud',
		// 'core/template-part',
		// 'core/text-columns',
		// 'core/verse',
		// 'core/video',
		// 'core/widget-area',

		// 'wbl/segment',
		// 'wbl/container',

		'contact-form-7/contact-form-selector',
	];

	// Uncomment to allow all blocks
	// return true;

	// Allow all blocks if no blocks are specified
    return $allowed_blocks;
}


/**
 * Creating a new block category.
 *
 * @param   array $categories     List of block categories.
 * @return  array
 */
function register_block_category( $categories ) {

    // The block category title and slug.
    $block_category = [
		'title' => Theme::get_name(),
		'slug' => Theme::get_id(),
		'icon'  => 'star-filled'
    ];

    $category_slugs = wp_list_pluck( $categories, 'slug' );

    if ( ! in_array( $block_category['slug'], $category_slugs, true ) ) {
        $categories = array_merge( $categories, [ $block_category ] );
    }

    return $categories;
}


/**
 * Load dynamic blocks
 *
 * @param array $blocks  with string of block names (directory name)
 */
function load_dynamic_blocks( $blocks = [] ) {

	// // Load block index files to kick-off block
	// array_map( function( $block ) {
	// 	require_once( Theme::src_path( "blocks/{$block}/index.php" ) );
	// }, $blocks );
}
