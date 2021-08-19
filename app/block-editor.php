<?php
/**
 * Setup
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 * 
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 */
add_action( 'after_setup_theme', function() {

	// Add support for wide and full aligned blocks
	add_theme_support( 'align-wide' );

	// Color palette
	add_theme_support( 'editor-color-palette', [
		[
			"name"  => "Primary",
			"slug"  => "primary",
			"color" => "#FFF7D6"
		],
		[
			"name"  => "Secondary",
			"slug"  => "secondary",
			"color" => "#000000"
		]
	]);

	// Disable custom colors: we don't want users to get too creative..
	add_theme_support( 'disable-custom-colors' );

	// Disable Gradients
	add_theme_support( 'editor-gradient-presets' );
	add_theme_support( 'disable-custom-gradients' );

	// Font-sizes. 
	add_theme_support( 'editor-font-sizes', [
		[ 
			"slug" => "extra-small",
			"size" => "0.825rem",
			"name" => "Extra Small"
		],
		[ 
			"slug" => "small",
			"size" => "0.875rem",
			"name" => "Small"
		],
		[ 
			"slug" => "normal",
			"size" => "1rem",
			"name" => "Normal"
		],
		[ 
			"slug" => "large",
			"size" => "1.25rem",
			"name" => "Large"
		],
		[ 
			"slug" => "extra-large",
			"size" => "1.5rem",
			"name" => "Extra Large"
		],
		[ 
			"slug" => "huge",
			"size" => "2rem",
			"name" => "Huge"
		],
		[ 
			"slug" => "gigantic",
			"size" => "2.5rem",
			"name" => "Gigantic"
		]
	] );

	// Disable custom font-size
	add_theme_support( 'disable-custom-font-sizes' );

	// Restrict the allowed blocks (opinionated)	 
	add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\allowed_block_types', 10, 2 );

	// Block styles
	add_action( 'init', __NAMESPACE__ . '\register_block_styles' );

	// Block patterns
	add_action( 'init', __NAMESPACE__ . '\register_block_patters' );

}, 5 );

/**
 * Restrict allowed blocks
 *
 * @link https://gist.github.com/erikjoling/7b05c3e3411244d126808bab46529d78
 * @link https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/index.js 
 * 
 * @return array
 */
function allowed_block_types( $allowed_blocks, $post ) {

	$allowed_blocks = [

		// Core blocks
		'core/button',
		'core/buttons',
		'core/column',
		'core/columns',
		'core/cover',
		'core/embed',
		'core/file',
		'core/gallery',
		'core/group',
		'core/heading',
		'core/html',
		'core/image',
		'core/list',
		'core/paragraph',
		'core/pullquote',
		'core/quote',
		'core/table',

		// WBL blocks
		'wbl-blocks/archive-loop',
		'wbl-blocks/posts',

		// WBL other blocks
		'wbl-projects/projects',

		// Third Party blocks
		'contact-form-7/contact-form-selector',
	];

	return $allowed_block_types;	
}

/**
 * Register block styles
 * 
 * @return void
 */
function register_block_styles() {

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
}

/**
 * Register block patterns
 * 
 * @return void
 */
function register_block_patters() {

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
}

