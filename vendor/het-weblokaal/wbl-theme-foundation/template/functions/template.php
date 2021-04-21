<?php 

namespace WBL\Theme;

function get_template_type() {

	$template_type = 'singular';

	// Display 404 template
	if (is_404()) {
		$template_type = '404';
	}

	// Display search page template
	elseif (is_search()) {
		$template_type = 'search';
	}

	// Display archive pages template
	elseif (is_archive() || is_home()) {
		$template_type = 'archive';
	}

	return $template_type;
}

function get_template_mod() {

	$template_mod = get_post_type();

	// Display custom page-template
	if ( $page_template = get_page_template_slug() ) {

		// Strip potential .php extension from template name
		$template_mod = rtrim($page_template, '.php');
	}

	return $template_mod;
}