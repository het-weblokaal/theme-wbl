<?php 

namespace WBL\Theme;

function get_template_types() {

	$template_types = ['index'];

	// Try `Page not found` template_type
	if (is_404()) {
		$template_types[] = '404';
	}

	// Try singular template types
	elseif (\is_singular()) {
		$template_types[] = get_post_type();

		// Display custom page-template
		if ( $page_template = get_page_template_slug() ) {

			// Strip potential .php extension from template name
			$template_types[] = rtrim($page_template, '.php');
		}
	}

	// Try archive template types
	elseif (is_archive() || is_home() || is_search()) {
		$template_types[] = 'archive';

		// Display search page template
		if (is_search()) {
			$template_types[] = 'search-archive';
		}
		elseif (\is_category()) {
			$template_types[] = 'category-archive';
		}
		elseif (\is_tag()) {
			$template_types[] = 'tag-archive';
		}
		elseif (\is_tax()) {
			$template_types[] = 'tax-archive';
			$template_types[] = get_query_var( 'taxonomy' ) . '-archive';
		}
		// elseif (\is_author()) {
		// 	$template_types[] = 'author-archive';
		// }
		// elseif (\is_date()) {
		// 	$template_types[] = 'date-archive';
		// }
	}

	return array_reverse( $template_types );
}
