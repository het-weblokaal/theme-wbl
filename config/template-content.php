<?php
/**
 * Titles of special pages
 *
 * It can be overruled by using the filter
 */

return [
	 // Array of plugin arrays.
	'search' => [
		'title' => sprintf(   esc_html__( 'Zoekresultaten voor: %s', 'theme-wbl' ), get_search_query() )
	],
	'404' => [
		'title' => __('Pagina niet gevonden', 'theme-wbl'),
		'content' => __('We kunnen de opgevraagde pagina niet vinden :/', 'theme-wbl')
	]
];
