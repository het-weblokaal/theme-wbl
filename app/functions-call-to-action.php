<?php

namespace Theme_WBL;

use Kirki;

// Add options to the theme customizer. (kirki hook = init)
add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_newsletter' );

// Add link to footer customizer section
add_action( 'admin_menu', __NAMESPACE__ . '\add_newsletter_customizer_link_to_menu');

/**
 * Render functions
 */

function render_call_to_action_title() {
	return get_theme_mod( 'call_to_action', [] )['title'] ?? '';
}

function render_call_to_action_content() {
	$content = get_theme_mod( 'call_to_action', [] )['content'] ?? '';

	return apply_filters( 'the_content', $content );
}

/**
 * Registers the customize settings and controls.
 */
function kirki_customize_register_newsletter() {
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

function add_newsletter_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Call To Action', 'Call To Action', 'edit_theme_options', 'customize.php?autofocus[section]=cta', '', null );
}
