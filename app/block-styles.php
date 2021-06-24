<?php
/**
 * Block Styles
 */

namespace WBL\Theme;

/**
 * Register block styles.
 *
 * @return void
 */
function register_block_styles() {

	// Columns: Overlap.
	register_block_style(
		'core/columns',
		array(
			'name'  => 'wbl-theme-columns-overlap',
			'label' => esc_html__( 'Overlap', 'wbl-theme' ),
		)
	);
}

add_action( 'init', __NAMESPACE__ . '\register_block_styles' );
