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
	add_filter( 'allowed_block_types_all', function( $allowed_block_types ) {

		// Add blocks specifically for this theme
		$allowed_block_types[] = 'core/gallery';

		return $allowed_block_types;
		
	}, 10, 2 );


}, 5 );

// Block styles
add_action( 'init', function() {

	// Columns: 2
	register_block_style( 'core/columns', array(
		'name'  => 'columns-2',
		'label' => esc_html__( 'Twee kolommen op een rij', 'wbl-theme' ),
		'isDefault' => true
	) );

	// Columns: 3
	register_block_style( 'core/columns', array(
		'name'  => 'columns-3',
		'label' => esc_html__( 'Drie kolommen op een rij', 'wbl-theme' ),
	) );

	// Columns: 4
	register_block_style( 'core/columns', array(
		'name'  => 'columns-4',
		'label' => esc_html__( 'Vier kolommen op een rij', 'wbl-theme' ),
	) );

	// List: no-bullets
	register_block_style( 'core/list', array(
		'name'  => 'no-bullets',
		'label' => esc_html__( 'Een lijst zonder punten', 'wbl-theme' ),
	) );

	// Gallery: inline image
	register_block_style( 'core/gallery', array(
		'name'  => 'inline-images',
		'label' => esc_html__( 'Galerij met inline afbeeldingen', 'wbl-theme' ),
	) );

	/**
	 * Register block patterns
	 */

	// Setup custom category for block patterns
	register_block_pattern_category( App::get_id(), [ 'label' => App::get_name() . ' blocks' ] );

	// Setup Two column section
	register_block_pattern( App::get_id() . "/two-column-section", [ 
		'title'      => esc_html__( 'Sectie met twee kolommen', 'wbl-theme' ),
		'categories' => [ App::get_id() ],
		'content'    => Template::render( 'block-patterns/two-column-section', null )
	] );

	// Setup About Us in 4 Columns
	register_block_pattern( App::get_id() . "/about-us-in-four-columns", [ 
		'title'      => esc_html__( 'Over Ons, in 4 kolommen', 'wbl-theme' ),
		'categories' => [ App::get_id() ],
		'content'    => Template::render( 'block-patterns/about-us-in-four-columns', null )
	] );

	// Setup Project Specs block pattern
	register_block_pattern( App::get_id() . "/project-specs", [ 
		'title'      => esc_html__( 'Project Specs', 'wbl-theme' ),
		'categories' => [ App::get_id() ],
		'content'    => Template::render( 'block-patterns/project-specs', null )
	] );
} );


