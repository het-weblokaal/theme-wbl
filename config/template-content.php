<?php
/**
 * Titles of special pages
 *
 * It can be overruled by using the filter
 */

return [
	 // Array of plugin arrays.
	'search' => [
		'title' => sprintf(   esc_html__( 'Search results for: %s', 'theme-wbl' ), get_search_query() )
	],
	'404' => [
		'title' => __('Page not found', 'theme-wbl')
	]
];
