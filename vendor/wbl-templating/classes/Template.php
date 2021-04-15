<?php
/**
 * Het Weblokaal Templating Class
 *
 * This class offers an API for WordPress themes to implement a standardized template organization
 */

namespace WBL\Templating;

use Theme_WBL\App;

/**
 * App Class
 *
 * This is the base class which a WP Theme or Plugin App Class will use
 */
final class Template {

	/**
	 * Arguments with which the app can be influenced
	 *
	 * @var array
	 */
	private static $args = [
		'template_dir' => 'vendor/wbl-templating/views',
		'theme_template_dir' => 'app/views',
	];

	/**
	 * Directory path with trailing slash.
	 *
	 * @var string
	 */
	private static $theme_path;

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


	/*=============================================================*/
	/**                        Getters                             */
	/*=============================================================*/

	/**
	 * Gets the app directory path with trailing slash.
	 *
	 * @return string
	 */
	public static function get_theme_path() {

		if ( is_null(static::$theme_path) ) {
			static::set_theme_path();
		}

		return static::$theme_path;
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
	 * Get the template relative path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function get_template_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::get_template_dir() . $relative_file;
	}


	/*=============================================================*/
	/**                        Setters                             */
	/*=============================================================*/

	/**
	 * Sets the app directory (with trailing slash)
	 *
	 * @return void
	 */
	private static function set_theme_path() {

		// Use WP function to get theme file path
		$theme_path = get_theme_file_path();

		static::$theme_path = $theme_path;
	}

	/**
	 * Sets the app template directory
	 *
	 * @return void
	 */
	private static function set_template_dir() {

		# Try to get value from arguments
		$template_dir = static::$args['template_dir'];

		# Not leading and trailing slashes
		$template_dir = trim($template_dir, '/');

		static::$template_dir = $template_dir;
	}

	
	/*=============================================================*/
	/**                       Utilities                            */
	/*=============================================================*/

	/**
	 * Render template file
	 */
	public static function render( $template, $name = null, $args = null ) {

		ob_start();

		static::display_template( $template, $name, $args);

		return ob_get_clean();
	}

	/**
	 * Display template file
	 */
	public static function display( $template, $name = null, $args = null ) {

		App::log($template);

		# Allow theme to override arguments
		$args = apply_filters( "wbl/template/args", $args, $template, $name);
		$args = apply_filters( "wbl/template/{$template}/args", $args, $template, $name);

		# Add relative template path
		$template = static::get_template_path( $template );

		get_template_part( $template, $name, $args );
	}
}

