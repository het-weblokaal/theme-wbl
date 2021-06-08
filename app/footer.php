<?php
/**
 * Footer functionality
 * 
 * Contents:
 * - Hooking up
 * - Functions for setup
 * - Template functions
 */

namespace WBL\Theme;

use Kirki;

/*--------------------------------------------------------------
# Hooking up 
--------------------------------------------------------------*/

// Add options to the theme customizer. (kirki hook = init)
add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_footer' );

// Add link to footer customizer section
add_action( 'admin_menu', __NAMESPACE__ . '\add_footer_customizer_link_to_menu');


/*--------------------------------------------------------------
# Functions for setup
--------------------------------------------------------------*/

/**
 * Registers the customize settings and controls.
 */
function kirki_customize_register_footer() {
	global $wp_customize;

	// Do not proceed if not in the customizer or if Kirki does not exist.
	if ( ! $wp_customize || ! class_exists( 'Kirki' ) ) {
		return;
	}

	// \Kirki::add_panel( 'footer', [
	// 	'title' => __( 'Footer' ),
	// 	'description' => '',
	// 	'priority' => 40, // Mixed with top-level-section hierarchy.
	// ] );

	// Add default config
	\Kirki::add_config( 'footer_config', [
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	] );

	// Add section
	\Kirki::add_section( 'footer', [
		'title'       => esc_html_x( 'Footer','Customizer Section', 'theme-wbl' ),
		'priority'    => 200,
		'panel'       => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'text',
		'settings' => 'footer_title',
		'label'    => esc_html__( 'Footer Title', 'theme-wbl' ),
		'section'  => 'footer',
		'default'  => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'code',
		'settings' => 'footer_contact_info',
		'label'    => esc_html__( 'Contact Info', 'theme-wbl' ),
		'section'  => 'footer',
		'choices'     => [
			'language' => 'html',
		],
		'default'  => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'code',
		'settings' => 'social_media',
		'label'    => esc_html__( 'Social Media', 'theme-wbl' ),
		'section'  => 'footer',
		'choices'     => [
			'language' => 'html',
		],
		'default'  => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'text',
		'settings' => 'credits',
		'label'    => esc_html__( 'Credits', 'theme-wbl' ),
		'section'  => 'footer',
		'default'  => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'editor',
		'settings' => 'documents',
		'label'    => esc_html__( 'Documents', 'theme-wbl' ),
		'section'  => 'footer',
		'default'  => '',
	] );

	Kirki::add_field( 'footer_config', [
		'type'     => 'editor',
		'settings' => 'colophon',
		'label'    => esc_html__( 'Colophon', 'theme-wbl' ),
		'section'  => 'footer',
		'default'  => '',
	] );
}

/**
 * Add footer to admin menu
 */
function add_footer_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Footer', 'Footer', 'edit_theme_options', 'customize.php?autofocus[section]=footer', '', null );
}

/*--------------------------------------------------------------
# Template functions 
--------------------------------------------------------------*/

/**
 * Render footer title
 */
function render_footer_title() {
	return get_theme_mod( 'footer_title', '' );
}

/**
 * Render footer contact info
 */
function render_footer_contact_info() {
	$contact_info = get_theme_mod( 'footer_contact_info', '' );

	return apply_filters( 'the_content', $contact_info );
}

/**
 * Render social media
 */
function render_social_media() {
	return get_theme_mod( 'social_media', '' );
}

/**
 * Render documents
 */
function render_documents() {
	$documents = get_theme_mod( 'documents', '' );

	return apply_filters( 'the_content', $documents );
}

/**
 * Render credits
 */
function render_credits() {
	return get_theme_mod( 'credits', '' );
}

/**
 * Render colophon
 */
function render_colophon() {
	$colophon = get_theme_mod( 'colophon', '' );

	return apply_filters( 'the_content', $colophon );
}