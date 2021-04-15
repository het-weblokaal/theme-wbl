<?php

/**
 * Media template functions
 *
 * Things like Featured image
 */

namespace WBL\Theme;


/**
 * Get the post featured image id
 *
 * We use has_post_thumbnail to trigger core-filter. This is a standard.
 *
 * @return int|false
 */
function get_featured_image_id() {

    return has_post_thumbnail() ? get_post_thumbnail_id() : false;
}

/**
 * Get the post featured image source
 *
 * @param  string $size
 * @return string
 */
function get_featured_image_src( $size = 'thumbnail' ) {

	$src = '';

    if ($image_id = get_featured_image_id()) {
	    $src = \wp_get_attachment_image_src( $image_id, $size )[0] ?? $src;
	}

	return $src;
}

/**
 * Render the post featured image
 *
 * @param  array  $args
 * @return string
 */
function render_featured_image( array $args = [] ) {

	$html = '';

	$args = wp_parse_args( $args, [
		'size' => 'thumbnail',
		'class' => ''
	] );

    if ($image_id = get_featured_image_id()) {
	    $html = \wp_get_attachment_image( $image_id, $args['size'], false, ['class' => $args['class']] );
	}

	return $html;
}
