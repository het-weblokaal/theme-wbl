<?php
/**
 * Call To Action functionality
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
add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_call_to_action' );

// Add link to footer customizer section
add_action( 'admin_menu', __NAMESPACE__ . '\add_call_to_action_customizer_link_to_menu');


/*--------------------------------------------------------------
# Functions for setup
--------------------------------------------------------------*/

/**
 * Registers the customize settings and controls.
 */
function kirki_customize_register_call_to_action() {
	global $wp_customize;

	// Do not proceed if not in the customizer or if Kirki does not exist.
	if ( ! $wp_customize || ! class_exists( 'Kirki' ) ) {
		return;
	}

	// Add default config
	\Kirki::add_config( 'cta_config', [
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	] );

	// Add section
	\Kirki::add_section( 'cta', [
		'title'       => esc_html_x( 'Call To Action','Customizer Section', 'theme-wbl' ),
		'priority'    => 200,
		'panel'       => '',
	] );

	Kirki::add_field( 'cta_config', [
		'type'     => 'text',
		'settings' => 'call_to_action[title]',
		'label'    => esc_html__( 'Title', 'theme-wbl' ),
		'section'  => 'cta',
		'default'  => '',
	] );

	Kirki::add_field( 'cta_config', [
		'type'     => 'editor',
		'settings' => 'call_to_action[content]',
		'label'    => esc_html__( 'Content', 'theme-wbl' ),
		'section'  => 'cta',
		'default'  => '',
	] );
}

/**
 * Add link to admin menu
 */
function add_call_to_action_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Call To Action', 'Call To Action', 'edit_theme_options', 'customize.php?autofocus[section]=cta', '', null );
}


/*--------------------------------------------------------------
# Template functions
--------------------------------------------------------------*/

/**
 * Render call to action title
 */
function render_call_to_action_title() {
	return get_theme_mod( 'call_to_action', [] )['title'] ?? '';
}

/**
 * Render call to action content
 */
function render_call_to_action_content() {
	$content = get_theme_mod( 'call_to_action', [] )['content'] ?? '';

	return apply_filters( 'the_content', $content );
}