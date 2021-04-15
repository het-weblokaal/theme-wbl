<?php
/**
 * Het Weblokaal Templating Class
 *
 * This class offers an API for WordPress themes to implement a standardized template organization
 */

namespace WBL\Theme;

/**
 * Template Class
 */
final class Template {

	/**
	 * Arguments with which the app can be influenced
	 *
	 * @var array
	 */
	private static $args = [
		'template_dir' => 'app/views',
	];

	/**
	 * Template folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $template_system_dir = 'het-weblokaal/wbl-theme-foundation/template-system';

	/**
	 * Template folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $template_dir;

	/**
     * Constructor method.
     *
     * @return void
     */
    private function __construct() {}

	/**
	 * Customize some App properties
	 *
	 * @return void
	 */
	public static function customize( $args ) {
		$args = wp_parse_args( $args, static::$args );

		static::$args = $args;
	}

	/**
	 * Gets the app template directory
	 *
	 * @return string
	 */
	public static function get_template_dir() {

		if ( is_null(static::$template_dir) ) {
			static::set_template_dir();
		}

		return static::$template_dir;
	}


	/**
	 * Sets the app template directory
	 *
	 * @return void
	 */
	private static function set_template_dir() {

		// Try to get value from arguments
		$template_dir = static::$args['template_dir'];

		// Not leading and trailing slashes
		$template_dir = trim($template_dir, '/');

		static::$template_dir = $template_dir;
	}


	/**
	 * Get the template relative path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function get_template_path( $relative_file = '' ) {

		// Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::get_template_dir() . $relative_file;
	}

	/**
	 * Get the template relative path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function get_template_system_path( $relative_file = '' ) {

		// Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::$template_system_dir . $relative_file;
	}


	/**
	 * Render template file
	 */
	public static function render( $slug, $name = null, $args = null ) {

		ob_start();

		static::display( $slug, $name, $args);

		return ob_get_clean();
	}


	/**
	 * Display template file
	 *
	 * This replaces the default WordPress template functionality but integrates the expected actions
	 *
	 * @link /wp-includes/general-template.php
	 */
	public static function display( $slug, $name = null, $args = null ) {

		// Allow theme to override arguments
		$args = apply_filters( "wbl/theme/template/args", $args, $slug, $name);
		$args = apply_filters( "wbl/theme/template/{$slug}/args", $args, $slug, $name);

		Theme::log("wbl/theme/template/{$slug}/args");

		// WordPress Core Action
		do_action( "get_template_part_{$slug}", $slug, $name, $args );

		$templates = array();

		$custom_slug = static::get_template_path( $slug );
		$vendor_slug = Theme::get_vendor_dir() . '/' . static::get_template_system_path( "views/$slug" );

		$name = (string) $name;
		if ( '' !== $name ) {
		    $templates[] = "{$custom_slug}-{$name}.php";
		    $templates[] = "{$vendor_slug}-{$name}.php";
		}

		$templates[] = "{$custom_slug}.php";
		$templates[] = "{$vendor_slug}.php";

		// Theme::log($templates);

		// WordPress Core Action
		do_action( 'get_template_part', $slug, $name, $templates, $args );

		if ( ! locate_template( $templates, true, false, $args ) ) {
		    return false;
    	}
	}
}

