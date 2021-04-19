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
	 * Arguments to customize
	 *
	 * @var array
	 */
	private static $args = [
		'main_template_dir'   => 'vendor/het-weblokaal/wbl-theme-foundation/template-system/views',
		'custom_template_dir' => 'app/views',
	];

	/**
	 * Template folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $main_template_dir;

	/**
	 * Template folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $custom_template_dir;

	/**
     * Constructor method.
     *
     * @return void
     */
    private function __construct() {}


	/*=============================================================*/
	/**                        Getters                             */
	/*=============================================================*/


	/**
	 * Gets the main template directory
	 *
	 * @return string
	 */
	private static function get_main_template_dir() {

		// Initialize if it's not set yet
		if ( is_null(static::$main_template_dir) ) {
			static::set_main_template_dir();
		}

		return static::$main_template_dir;
	}

	/**
	 * Gets the custom template directory
	 *
	 * @return string
	 */
	private static function get_custom_template_dir() {

		// Initialize if it's not set yet
		if ( is_null(static::$custom_template_dir) ) {
			static::set_custom_template_dir();
		}

		return static::$custom_template_dir;
	}


	/*=============================================================*/
	/**                        Setters                             */
	/*=============================================================*/


	/**
	 * Sets the main template directory
	 *
	 * @return void
	 */
	private static function set_main_template_dir() {

		// Set the template dir based on class $args
		$main_template_dir = static::$args['main_template_dir'];

		// Not leading and trailing slashes
		$main_template_dir = trim($main_template_dir, '/');

		static::$main_template_dir = $main_template_dir;
	}

	/**
	 * Sets the custom template directory
	 *
	 * @return void
	 */
	private static function set_custom_template_dir() {

		// Set the template dir based on class $args
		$custom_template_dir = static::$args['custom_template_dir'];

		// Not leading and trailing slashes
		$custom_template_dir = trim($custom_template_dir, '/');

		static::$custom_template_dir = $custom_template_dir;
	}


	/*=============================================================*/
	/**                        General                             */
	/*=============================================================*/

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

		// Setup templates
		$templates = array();

		// Setup template data
		$template_data = [
			'slug' => $slug,
			'name' => $name,
			'args' => $args,
			'file' => null,
		];

		// Allow to change the template data
		$template_data = apply_filters( "wbl/theme/template/{$slug}", $template_data);

		// Set slug, name and args based on filtered template_data
		$slug = $template_data['slug'];
		$name = $template_data['name'];
		$args = $template_data['args'];

		// WordPress Core Action
		do_action( "get_template_part_{$slug}", $slug, $name, $args );

		// Setup slug for main template path
		$main_slug = static::get_main_template_path( $slug );

		// Setup slug for custom template path
		$custom_slug = static::get_custom_template_path( $slug );

		// Allow plugin or theme to pass custom file for template
		if ( !empty($template_data['file']) ) {
			$templates[] = $template_data['file'];
		}

		/**
		 * Set template priority
		 *
		 * - A template with a specific name is higher in order than the basic template
		 * - The custom template is higher in order than main template
		 */
		$name = (string) $name;
		if ( '' !== $name ) {
		    $templates[] = "{$custom_slug}--{$name}.php";
		    $templates[] = "{$main_slug}--{$name}.php";
		}

		$templates[] = "{$custom_slug}.php";
		$templates[] = "{$main_slug}.php";

		// WordPress Core Action
		do_action( 'get_template_part', $slug, $name, $templates, $args );

		if ( ! locate_template( $templates, true, false, $args ) ) {
		    return false;
    	}
	}


	/*=============================================================*/
	/**                       Utilities                            */
	/*=============================================================*/


	/**
	 * Get the main template path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function get_main_template_path( $relative_file = '' ) {

		// Remove any leading and trailing slashes
		$relative_file = trim( $relative_file, '/' );

		return static::get_main_template_dir() . '/' . $relative_file;
	}

	/**
	 * Get the template relative path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function get_custom_template_path( $relative_file = '' ) {

		// Remove any leading and trailing slashes
		$relative_file = trim( $relative_file, '/' );

		return static::get_custom_template_dir() . '/' . $relative_file;
	}

	/**
	 * Allow arguments to be customized
	 *
	 * @return void
	 */
	public static function customize( $custom_args ) {

		// Parse the custom arguments
		$custom_args = wp_parse_args( $custom_args, static::$args );

		// Set new args
		static::$args = $custom_args;
	}

	/**
	 * Log data to wp-content/debug.log
	 *
	 * It doesn't matter if WP_DEBUG is true because I also want to be able
	 * to log on production environment (which has WP_DEBUG disabled)
	 */
	public static function status_log()  {

	    // Set properties
		Theme::log( '' );
		Theme::log( '====== START: TEMPLATE STATUS LOG ======' );
		Theme::log( '' );
		Theme::log( '' );
		Theme::log( '   args:      ' );
		Theme::log( static::$args );
		Theme::log( '   main_template_dir:        ' . static::get_main_template_dir() );
		Theme::log( '   custom_template_dir:      ' . static::get_custom_template_dir() );
		Theme::log( '' );
		Theme::log( '' );
		Theme::log( '======= END: TEMPLATE STATUS LOG =======' );
		Theme::log( '' );
	}
}

