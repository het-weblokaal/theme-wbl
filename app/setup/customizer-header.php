<?php
/**
 * Theme customizer functions.
 */

namespace ClimateCampus;

use Kirki;

/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	# Add options to the theme customizer. (kirki hook = init)
	add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_header' );

	# Add shortcut links to menu in admin
	add_action( 'admin_menu', __NAMESPACE__ . '\add_header_customizer_link_to_menu');

}, 5 );


function get_header_option( $key, $fallback = false ) {
	return get_theme_mod( get_header_option_name($key), $fallback );
}

function get_header_option_name( $key ) {
	return "header_{$key}";
}

/**
 * Get header extra content (for site nav popup)
 *
 * @return string
 */
function get_header_extra_content() {

	return get_header_option('extra_content');
}

/**
 * Registers the customize settings and controls.
 */
function kirki_customize_register_header() {
	global $wp_customize;

	// Do not proceed if not in the customizer or if Kirki does not exist.
	if ( ! $wp_customize || ! class_exists( 'Kirki' ) ) {
		return;
	}

	// Add default config
	\Kirki::add_config( 'header_config', [
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
		'disable_output' => true,
	] );

	// Add section
	\Kirki::add_section( 'header', [
		'title'       => esc_html_x( 'Header','Customizer Section', 'clc' ),
		'priority'    => 160,
		'panel'       => '',
	] );

	# Menu items
	Kirki::add_field( 'header_config', [
		'type'        => 'custom',
		'settings'    => 'custom_text_header_menus',
		'label'       => esc_html_x( 'Header menu\'s', 'Customizer', 'clc' ),
		'section'     => 'header',
		'default'     => sprintf(
			'Voeg via het <a href="%s">menu-beheer</a> de menu\'s toe aan de header.',
			\get_admin_url(null, 'nav-menus.php?action=edit' )
		),
	] );

	# Extra content
	Kirki::add_field( 'header_config', [
		'type'     => 'editor',
		'settings' => get_header_option_name('extra_content'),
		'label'    => esc_html__( 'Header Extra Content', 'clc' ),
		'section'  => 'header',
		'default'  => '',
	] );
}

function add_header_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Header', 'Header', 'edit_theme_options', 'customize.php?autofocus[section]=header', '', null );
}
