<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	/**
	 * Register block patterns
	 */

	// Setup custom category for block patterns
	// register_block_pattern_category( Theme::get_id(), [ 'label' => Theme::get_name() ], 'Theme category' );

	// Setup block patterns
	// register_block_pattern( Theme::get_id() . "/hero", require Theme::template_path( 'block-patterns/hero.php' ) );

}, 5 );

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
