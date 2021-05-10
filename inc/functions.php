<?php
/**
 * Functions
 */

namespace WBL\Theme;

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
 * Global color styles
 *
 * Mimics the global styles which are experimental in the plugin
 *
 * @link: /wp-content/plugins/gutenberg/lib/global-styles.php
 */
function get_global_color_inline_style() {
    $css = "";

    $theme_colors = get_theme_support( 'editor-color-palette' )[0] ?? [];

    if ($theme_colors) {

        $css = ":root { \n";
        foreach ( $theme_colors as $color ) {
            $css .= "   --wp--preset--color--{$color['slug']}: {$color['color']};\n";
        }
        $css .= "}";
    }

    return $css;
}
