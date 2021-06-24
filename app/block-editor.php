<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/**
	 * Restrict the allowed blocks (opinionated)
	 */
	add_filter( 'allowed_block_types', function( $allowed_block_types ) {

		// Add blocks specifically for this theme
		$allowed_block_types[] = 'wbl-projects/projects';

		return $allowed_block_types;
		
	}, 10, 2 );

	// Block styles
	add_action( 'init', function() {

		// Columns: 2
		register_block_style(
			'core/columns',
			array(
				'name'  => 'columns-2',
				'label' => esc_html__( 'Twee kolommen op een rij', 'wbl-theme' ),
				'isDefault' => true
			)
		);

		// Columns: 3
		register_block_style(
			'core/columns',
			array(
				'name'  => 'columns-3',
				'label' => esc_html__( 'Drie kolommen op een rij', 'wbl-theme' ),
			)
		);

		// Columns: 4
		register_block_style(
			'core/columns',
			array(
				'name'  => 'columns-4',
				'label' => esc_html__( 'Vier kolommen op een rij', 'wbl-theme' ),
			)
		);

		// List: no-bullets
		register_block_style(
			'core/list',
			array(
				'name'  => 'no-bullets',
				'label' => esc_html__( 'Een lijst zonder punten', 'wbl-theme' ),
			)
		);
	} );

	// Add block category for this theme
	// add_filter( 'block_categories', __NAMESPACE__ . '\register_block_category' );

	/**
	 * Register block patterns
	 */

	// Setup custom category for block patterns
	register_block_pattern_category( App::get_id(), [ 'label' => App::get_name() . ' blocks' ] );

	// Setup Test block pattern
	register_block_pattern( App::get_id() . "/test", [ 
		'title'      => esc_html__( 'Test', 'wbl-theme' ),
		'categories' => [ App::get_id() ],
		'content'    => Template::render( 'block-patterns/test', null )
	] );

	// Setup Project Specs block pattern
	register_block_pattern( App::get_id() . "/project-specs", [ 
		'title'      => esc_html__( 'Project Specs', 'wbl-theme' ),
		'categories' => [ App::get_id() ],
		'content'    => Template::render( 'block-patterns/project-specs', null )
	] );

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
