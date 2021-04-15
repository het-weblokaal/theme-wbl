<?php
/**
 * This file holds the theme configuration. It's a sort of predecessor of the expected theme.json
 *
 * @link: https://developer.wordpress.org/block-editor/developers/themes/theme-json/
 */

return [
	'add' => [
		'title-tag', // Automatically add the `<title>` tag.
		'custom-logo' => [
			// 'height'               => $logo_height,
			// 'width'                => $logo_width,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		],
		// 'post-formats' => [ 'aside', 'gallery', 'image', 'quote' ]
		'html5' => [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ],

		'post-thumbnails', // Adds featured image support for all

		/**
		 * Block Editor
		 */

		'editor-color-palette' => [
			[
				'name' => __( 'Primary Color', 'theme-wbl' ),
				'slug' => 'primary-1',
				'color' => '#FFF7D6' //'#fff5cc',
			],
			[
				'name' => __( 'Secondary Color', 'theme-wbl' ),
				'slug' => 'secondary-1',
				'color' => '#000000',
			]
		],
		'align-wide',
		'disable-custom-colors', // Disable colors
		'disable-custom-font-sizes', // Disable font-sizes
		'disable-custom-gradients', // Disable gradients
		'editor-font-sizes', // Disable font-sizes
		'editor-gradient-presets',  // Disable gradients

		// 'experimental-custom-spacing',

	],
	'remove' => [
		// 'core-block-patterns' => false
	]
];
