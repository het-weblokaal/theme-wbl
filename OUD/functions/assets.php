<?php
/**
 * Asset-related functions and filters.
 *
 * This file holds some setup actions for scripts and styles as well as a helper
 * functions for work with assets.
 *
 * @package   HWL\WBL
 * @author    Erik Joling <erik.info@hetweblokaal.nl>
 * @copyright 2020 Het Weblokaal
 * @link      https://www.hetweblokaal.nl/
 */

namespace Theme_WBL;

/**
 * Enqueue scripts/styles on frontend
 */
function manage_frontend_scripts_and_styles() {

	add_action('wp_head', function() {
		?>
        <script>
        	var theme = {
        		version : '<?= App::get_version() ?>'
        	};
        </script>
		<?php
	});

	// Remove Gutenberg styles
	wp_dequeue_style( 'wp-block-library' );

	// Add theme script and style
	wp_enqueue_script( 'theme-wbl', Utils::asset( 'js/theme.js' ), null, null, true );
	wp_enqueue_style( 'theme-wbl', Utils::asset( 'css/style.css' ), null, null );
	wp_enqueue_style( 'theme-wbl-font', wptt_get_webfont_url( 'https://use.typekit.net/pwk2csi.css' ), null, App::get_version() );

	// Mimic global styles which are currently Gutenberg plugin-only
	if ($global_color_styles = get_global_color_styles()) {
		$stylesheet = ":root { \n";
		$stylesheet .= $global_color_styles;
		$stylesheet .= "}";
	}

	// Register global styles
	wp_register_style( 'hwl-global-style', false, array(), true, true );
	wp_add_inline_style( 'hwl-global-style', $stylesheet );
	wp_enqueue_style( 'hwl-global-style' );
}

/**
 * Enqueue scripts/styles on backend block editor
 */
function manage_block_editor_scripts_and_styles() {

	// Remove core editor google font
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', '' );

	// Add script to cleanup unwanted functionality
	wp_enqueue_script(
		'theme-wbl-block-editor',
		Utils::asset( 'js/block-editor.js' ),
		[ 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ]
	);

	// Add the themes editor styles to the editor
	wp_enqueue_style( 'theme-wbl-editor-style', Utils::asset( 'css/editor-style.css' ), null, null );

	// Mimic global styles which are currently Gutenberg plugin-only
	if ($global_color_styles = get_global_color_styles()) {
		$stylesheet = ":root { \n";
		$stylesheet .= $global_color_styles;
		$stylesheet .= "}";
	}

	// Register global styles
	wp_register_style( 'hwl-global-editor-style', false, array(), true, true );
	wp_add_inline_style( 'hwl-global-editor-style', $stylesheet );
	wp_enqueue_style( 'hwl-global-editor-style' );
};

/**
 * Global styles
 *
 * Mimics the global styles which are experimental in the plugin
 * @link: /wp-content/plugins/gutenberg/lib/global-styles.php
 */
function get_global_color_styles() {
	$styles = "";

	$theme_colors = get_theme_support( 'editor-color-palette' )[0] ?? [];
	foreach ( $theme_colors as $color ) {
		$styles .= "	--wp--preset--color--{$color['slug']}: {$color['color']};\n";
	}

	return $styles;
}
