<?php
/**
 * Theme page template functions.
 */

namespace WBL\Theme;


/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	/* Filter theme post templates to add registered templates. */
	add_filter( 'theme_templates', __NAMESPACE__ . '\custom_templates', 10, 4 );

}, 5 );


/**
 * Filter used on `theme_templates` to add custom templates to the template
 * drop-down.
 *
 * @param  array   $templates
 * @param  object  $theme
 * @param  object  $post
 * @param  string  $post_type
 * @return array
 */
function custom_templates( $templates, $theme, $post, $post_type ) {

	$templates['landing-page'] = 'Landing Page';

	return $templates;
}

