<?php

/**
 * Newsletter class
 *
 * We use a class to box all the related functionality..
 */

namespace WBL\Theme;

use Kirki;

/**
 * Setup at regular hook
 */
add_action( 'after_setup_theme', function() {

	// Add options to the theme customizer. (kirki hook = init)
	add_action( 'init', __NAMESPACE__ . '\kirki_customize_register_newsletter' );

	// Add link to footer customizer section
	add_action( 'admin_menu', __NAMESPACE__ . '\add_newsletter_customizer_link_to_menu' );
});


function get_newsletter_option( $key, $fallback = false ) {
	return get_theme_mod( get_newsletter_option_name($key), $fallback );
}

function get_newsletter_option_name( $key ) {
	return "newsletter_{$key}";
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
	\Kirki::add_config( 'newsletter_config', [
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	] );

	// Add section
	\Kirki::add_section( 'newsletter', [
		'title'    => esc_html_x( 'Nieuwsbrief','Customizer Section', 'clc' ),
		'priority' => 160,
		'panel'    => '',
	] );

	\Kirki::add_field( 'newsletter_config', [
        'section'  => 'newsletter',
        'type'     => 'toggle',
        'settings' => get_newsletter_option_name('active'),
        'label'    => esc_html__('Activeren', 'clc'),
        'default'  => false,
    ] );

	Kirki::add_field( 'newsletter_config', [
		'type'     => 'text',
		'settings' => get_newsletter_option_name('heading'),
		'label'    => esc_html__( 'Nieuwsbrief kop', 'clc' ),
		'section'  => 'newsletter',
		'default'  => '',
		'transport' => false,
	] );

	Kirki::add_field( 'newsletter_config', [
		'type'     => 'textarea',
		'settings' => get_newsletter_option_name('content'),
		'label'    => esc_html__( 'Nieuwsbrief tekst', 'clc' ),
		'section'  => 'newsletter',
		'default'  => '',
		'transport' => false
	] );

	Kirki::add_field( 'newsletter_config', [
		'type'     => 'text',
		'settings' => get_newsletter_option_name('button_text'),
		'label'    => esc_html__( 'Nieuwsbrief knoptekst', 'clc' ),
		'section'  => 'newsletter',
		'default'  => '',
		'transport' => false
	] );

	Kirki::add_field( 'newsletter_config', [
		'type'     => 'link',
		'settings' => get_newsletter_option_name('link'),
		'label'    => esc_html_x( 'Nieuwsbrief link','Customizer', 'clc' ),
		'description' => esc_html_x( 'Link naar het externe inschrijfformulier','Customizer', 'clc' ),
		'section'  => 'newsletter',
		'default'  => '',
		'transport' => false
	] );

}

/**
 * Add footer link to appearance menu
 */
function add_newsletter_customizer_link_to_menu() {
	add_submenu_page( 'themes.php', 'Nieuwsbrief', 'Nieuwsbrief', 'edit_theme_options', 'customize.php?autofocus[section]=newsletter', '', null );
}
