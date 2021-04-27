<?php
/**
 * Template entry functions.
 */

namespace WBL\Theme;

function display_loop( $query, $template_slug, $template_hierarchy ) {

	while ( $query->have_posts() ) {
		$query->the_post();

		Template::display( $template_slug, $template_hierarchy );

		// Reset postdata if this is a custom query
		if ( ! $query->is_main_query() ) {
			$query->reset_postdata();
		}
	}
}
