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
	add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_footer' );

	# Add shortcut links to menu in admin
	add_action( 'admin_menu', __NAMESPACE__ . '\add_footer_customizer_link_to_menu');

}, 5 );


function get_footer_option( $key, $fallback = false ) {
	return get_theme_mod( get_footer_option_name($key), $fallback );
}

function get_footer_option_name( $key ) {
	return "footer_{$key}";
}

/**
 * Get footer menu 1
 *
 * @return string
 */
function get_footer_menu_1() {

	return get_footer_option('menu_1');
}

/**
 * Get footer menu 2
 *
 * @return string
 */
function get_footer_menu_2() {

	return get_footer_option('menu_2');
}

/**
 * Get footer content 1
 *
 * @return string
 */
function get_footer_content_1() {

	return get_footer_option('content_1');
}

/**
 * Get footer content 2
 *
 * @return string
 */
function get_footer_content_2() {

	return get_footer_option('content_2');
}


/**
 * Registers the customize settings and controls.
 */
function kirki_customize_register_footer() {
	global $wp_customize;

	// Do not proceed if not in the customizer or if Kirki does not exist.
	if ( ! $wp_customize || ! class_exists( 'Kirki' ) ) {
		return;
	}

	// Add config for footer options
	\Kirki::add_config( 'footer_config', [
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
		'disable_output' => true,
	] );

	// Add section
	\Kirki::add_section( 'footer', [
		'title'       => esc_html_x( 'Footer','Customizer Section', 'clc' ),
		'priority'    => 160,
		'panel'       => '',
	] );


	/**
	 * Select footer menu
	 *
	 * Kirki saves the nav_menu_id as string, while core expects it to be integer
	 * This results in both settings not being able to be set at the same time.
	 * As a solution, we don't add the selection of a menu to the footer section
	 * of the customizer, but point them to the menu settings of the admin.
	 *
	 * We disable the menu-settings in the customizer.
	 */

	# Menu items
	Kirki::add_field( 'footer_config', [
		'type'        => 'custom',
		'settings'    => 'custom_text_footer_menus',
		'label'       => esc_html_x( 'Footer menu\'s', 'Customizer', 'clc' ),
		'section'     => 'footer',
		'default'     => sprintf(
			'Voeg via het <a href="%s">menu-beheer</a> de menu\'s toe aan de footer.',
			\get_admin_url(null, 'nav-menus.php?action=edit' )
		),
	] );

	# Set footer content 1
	Kirki::add_field( 'footer_config', [
		'type'     => 'editor',
		'settings' => get_footer_option_name('content_1'),
		'label'    => esc_html__( 'Footer Content 1', 'clc' ),
		'section'  => 'footer',
		'default'  => '',
	] );

	# Set footer content 2
	Kirki::add_field( 'footer_config', [
		'type'     => 'editor',
		'settings' => get_footer_option_name('content_2'),
		'label'    => esc_html__( 'Footer Content 2', 'clc' ),
		'section'  => 'footer',
		'default'  => '',
	] );

	# Set copyright
	Kirki::add_field( 'footer_config', [
		'type'     => 'editor',
		'settings' => get_footer_option_name('copyright'),
		'label'    => esc_html__( 'Copyright', 'clc' ),
		'section'  => 'footer',
		'default'  => '',
	] );
}

function add_footer_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Footer', 'Footer', 'edit_theme_options', 'customize.php?autofocus[section]=footer', '', null );
}
