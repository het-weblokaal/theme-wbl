<?php

namespace Theme_WBL;


/**
 * Returns the body classes.
 *
 * @return string
 */
function body_class( $classes ) {

	// Reset..
	$classes = [];

	if ( \is_singular() ) {
		$classes[] = 'is-singular';
		$classes[] = 'is-singular--' . \get_post_type();

		if ($status = get_password_protection_status()) {
			$classes[] = 'is-password-protected';
			$classes[] = "is-password-protected--$status";
		}

		// Check for custom template
		if ($template = get_page_template_slug()) {

			// Normalizes template name
			$template = str_replace( [ 'template-', 'tmpl-' ], '', basename( $template, '.php' ) );

			$classes[] = "is-template";
			$classes[] = "is-template--{$template}";
		}
	}
	elseif ( \is_archive() || \is_home() ) {
		$classes[] = 'is-archive';
		$classes[] = 'is-archive--' . \get_post_type();
	}
	elseif ( \is_404() ) {
		$classes[] = 'is-404';
	}
	elseif ( \is_search() ) {
		$classes[] = 'is-search';
	}

	if ( \is_admin_bar_showing() ) {
		$classes[] = 'has-admin-bar';
	}

	if ( Utils::get_version_type() == 'development' ) {
		$classes[] = 'is-development';
	}

	return array_map( 'esc_attr', $classes );
}

/**
 * Returns the post classes.
 *
 * @return string
 */
function post_class( $classes ) {

	// $post = get_post( $post_id );

	// Reset..
	$classes = [];

	if ($status = get_password_protection_status()) {
		$classes[] = 'is-password-protected';
		$classes[] = "is-password-protected--$status";
	}

	if (has_post_thumbnail()) {
		$classes[] = 'has-featured-image';
	}

	return array_map( 'esc_attr', $classes );
}

/**
 * Simplifies the nav menu class system.
 *
 * @param  array   $classes
 * @param  object  $item
 * @return array
 */
function nav_menu_css_class( $classes, $item ) {

	$_classes = [ 'menu__item' ];

	// On 404 pages don't add current, ancestor relation in menu
	// Because 404 pages think they belong to the blog index page...
	if ( ! \is_404() ) {

		foreach ( [ 'item', 'parent', 'ancestor' ] as $type ) {

			if ( in_array( "current-menu-{$type}", $classes ) || in_array( "current_page_{$type}", $classes ) ) {

				$_classes[] = 'item' === $type ? 'menu__item--current' : "menu__item--{$type}";
			}
		}

		// If the menu item is a post type archive and we're viewing a single
		// post of that post type, the menu item should be an ancestor.
		if ( 'post_type_archive' === $item->type && \is_singular( $item->object ) && ! in_array( 'menu__item--ancestor', $_classes ) ) {
			$_classes[] = 'menu__item--ancestor';
		}

		// // Fix modifiers for agenda archive page
		// if ( $item->object_id === get_agenda_archive_page() ) {
		// 	if ( \is_post_type_archive(get_agenda_post_type()) ) {
		// 		$_classes[] = 'menu__item--current';
		// 	}
		// 	elseif ( \is_singular(get_agenda_post_type()) ) {
		// 		$_classes[] = 'menu__item--ancestor';
		// 	}
		// }
	}

	// Add a class if the menu item has children.
	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$_classes[] = 'has-children';
	}

	// Add custom user-added classes if we have any.
	$custom = \get_post_meta( $item->ID, '_menu_item_classes', true );

	if ( $custom ) {
		$_classes = array_merge( $_classes, (array) $custom );
	}

	return $_classes;
}


/**
 * Simplifies the nav menu class system.
 *
 * @param string $item_id
 * @return string
 */
function nav_menu_item_id( $item_id ) {
	$item_id = '';

	return $item_id;
}

/**
 * Adds a custom class to the nav menu link.
 *
 * @param  array   $attr;
 * @return array
 */
function nav_menu_link_attributes( $attr ) {

	$attr['class'] = 'menu__link';

	return $attr;
}

/**
 * Adds a custom class to the submenus in nav menus.
 *
 * @param  array   $classes
 * @return array
 */
function nav_menu_submenu_css_class( $classes ) {

	$classes = [ 'menu__sub-menu' ];

	return $classes;
}


/**
 * EXCERPT
 */

function edit_excerpt_link( $more ) {

    return "&nbsp;<span class=\"excerpt__delimiter\">...<span>";
}

function excerpt_length( $length ) {

    return 24;
}

/**
 * Password protection
 */

function edit_password_protected_title() {
	return '%s';
	// return '<span class="icon">' . Utils::svg('lock-alt') . '</span><span>%s</span>';
}

function the_password_form() {
	return View::render( 'components/password-protection-form' );
}

function edit_password_protected_excerpt( $excerpt ) {

	if ( $status = get_password_protection_status() ) {

		if ($status == 'locked') {
 			$excerpt = '<p>' . __('Voor dit bericht heb je een wachtwoord nodig.', 'theme-wbl') . '</p>';
 		}
	}

    return $excerpt;
}


/**
 * Overrides the default comments template with this themes comment-template
 *
 * @param  string $template
 * @return string
 */
function comments_template( $template ) {

	$templates = [
		View::get_dir() . 'components/page-comments.php' ,
		View::get_dir() . 'page-comments.php'
	];

	// Return the found template.
	return locate_template( $templates );
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
        // This comment will be removed by Gutenberg since it won't parse into block.
        $post->post_content = '<!--non-empty-content-->';
    }

    return $replace;

}


/**
 * Override editor-color-palette arguments
 */
function custom_editor_color_palette( $args ) {

	// $new_colors = [
	// 	'primary-1' => '#e3fac0',
	// 	'secondary-1' => '#3d505b',
	// 	'tertiary-1' => '#ffc888',
	// ];

	// for ($i=0; $i < count($args); $i++) {

	// 	// Set new color if it matches the slug
	// 	$args[$i]['color'] = $new_colors[$args[$i]['slug']] ?? $args[$i]['color'];
	// }

	return $args;
}

/**
 * Disables the lazy-load feature (added in WP 5.5) for the custom logo
 *
 * @param array $custom_logo_attr
 * @return array $custom_logo_attr
 */
function disable_logo_lazy_load( $custom_logo_attr ) {
	$custom_logo_attr['loading'] = false;

	return $custom_logo_attr;
}

/**
 * Append a list of blocks which we allow in the Gutenberg editor
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#hiding-blocks-from-the-inserter
 * @link https://github.com/WordPress/gutenberg/blob/master/packages/block-library/src/index.js
 */
function extra_blocks( $extra_blocks, $post ) {

    return array_merge($extra_blocks, Config::get( 'blocks', 'allow_extra' ));
}

/**
 * Append a list of blocks which we disallow in the Gutenberg editor
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#hiding-blocks-from-the-inserter
 * @link https://github.com/WordPress/gutenberg/blob/master/packages/block-library/src/index.js
 */
function disallow_blocks( $disallowed_blocks, $post ) {

    return array_merge($disallowed_blocks, Config::get( 'blocks', 'disallow' ));
}

/**
 * Append a list of blocks which we disallow in the Gutenberg editor
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#hiding-blocks-from-the-inserter
 * @link https://github.com/WordPress/gutenberg/blob/master/packages/block-library/src/index.js
 */
function allowed_block_types( $allowed_blocks, $post ) {

	$allowed_blocks_config = Config::get( 'blocks', 'allow' );

	return (is_array($allowed_blocks_config)) ? array_merge($allowed_blocks, $allowed_blocks_config) : $allowed_blocks_config;
}
