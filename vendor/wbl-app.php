<?php
/**
 * WordPress App Class for Themes and Plugins
 *
 * Version: 1.0-alpha-12
 * Author: Erik Joling | Het Weblokaal <erik.info@hetweblokaal.nl>
 * Author URI: https://www.hetweblokaal.nl/
 *
 * This class offers an API for WordPress themes and plugins to standardize code organization.
 *
 *
 * Usage:
 * 1. Copy this file in the vendor folder
 * 2. Match the namespace to the theme/plugin
 * 3. Load the file
 * 4. Make use of the methods through static::<method>
 * +. Customize some properties through static::customize()
 */

namespace Theme_WBL;


/**
 * App Class
 *
 * This is the base class which a WP Theme or Plugin App Class will use
 */
final class App {

	/**
	 * Arguments with which the app can be influenced
	 *
	 * @var array
	 */
	private static $args = [
		'id'           => '',
		'name'         => '',
		'config_dir'   => 'config',
		'inc_dir'      => 'app',
		'assets_dir'   => 'public',
		'src_dir'      => 'resources',
		'template_dir' => 'app/template',
		'blocks_dir'   => 'resources/blocks',
		'lang_dir'     => 'resources/lang',
		'vendor_dir'   => 'vendor',
		'wbl_app_dir'  => 'vendor',
	];

	/**
	 * The id of the app. i.e. the handle
	 *
	 * @var string
	 */
	private static $id;

	/**
	 * The slug of the app
	 *
	 * @var string
	 */
	private static $slug;

	/**
	 * The name of the app to show to endusers
	 *
	 * @var string
	 */
	private static $name;

	/**
	 * The Type of app. i.e. theme or plugin
	 *
	 * @var string
	 */
	private static $type;

	/**
	 * Directory path with trailing slash.
	 *
	 * @var string
	 */
	private static $path;

	/**
	 * Directory URI with trailing slash.
	 *
	 * @var string
	 */
	private static $uri;

	/**
	 * Sets the app file. The file which holds the metadata of this app (plugin or theme)
	 *
	 * @var string
	 */
	private static $meta_file;

	/**
	 * Version
	 *
	 * @var string
	 */
	private static $version;

	/**
	 * Relative Config folder
	 *
	 * @var string
	 */
	private static $config_dir;

	/**
	 * Includes folder (relative to plugin/theme) for app setup and includes
	 *
	 * @var string
	 */
	private static $inc_dir;

	/**
	 * Public folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $assets_dir;

	/**
	 * Resource folder (relative to plugin/theme) for uncompiled code
	 *
	 * @var string
	 */
	private static $src_dir;

	/**
	 * Template folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $template_dir;

	/**
	 * Blocks folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $blocks_dir;

	/**
	 * Language folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $lang_dir;

	/**
	 * Vendor folder (relative to plugin/theme)
	 *
	 * @var string
	 */
	private static $vendor_dir;

	/**
	 * Laravel mix manifest
	 *
	 * @var string
	 */
	private static $mix_manifest = null;

	/**
	 * WBL App version
	 *
	 * @var string
	 */
	private static $wbl_app_version = null;

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
	 * Gets the app id
	 *
	 * @return string $id
	 */
	public static function get_id() {

		if ( is_null(static::$id) ) {
			static::set_id();
		}

		return static::$id;
	}

	/**
	 * Gets the app slug
	 *
	 * @return string $slug
	 */
	public static function get_slug() {

		if ( is_null(static::$slug) ) {
			static::set_slug();
		}

		return static::$slug;
	}

	/**
	 * Gets the app name
	 *
	 * @return string $name
	 */
	public static function get_name() {

		if ( is_null(static::$name) ) {
			static::set_name();
		}

		return static::$name;
	}


	/**
	 * Gets the app type
	 *
	 * @return string $type (theme or plugin)
	 */
	public static function get_type() {

		if ( is_null(static::$type) ) {
			static::set_type();
		}

		return static::$type;
	}

	/**
	 * Gets the app directory path with trailing slash.
	 *
	 * @return string
	 */
	public static function get_path() {

		if ( is_null(static::$path) ) {
			static::set_path();
		}

		return static::$path;
	}

	/**
	 * Gets the app uri path with trailing slash.
	 *
	 * @return string
	 */
	public static function get_uri() {

		if ( is_null(static::$uri) ) {
			static::set_uri();
		}

		return static::$uri;
	}

	/**
	 * Gets the app directory path with trailing slash.
	 *
	 * @return string
	 */
	public static function get_meta_file() {

		if ( is_null(static::$meta_file) ) {
			static::set_meta_file();
		}

		return static::$meta_file;
	}

	/**
	 * Gets the app version
	 *
	 * @return string
	 */
	public static function get_version() {

		if ( is_null(static::$version) ) {
			static::set_version();
		}

		return static::$version;
	}

	/**
	 * Gets the config directory
	 *
	 * @return string
	 */
	public static function get_config_dir() {

		if ( is_null(static::$config_dir) ) {
			static::set_config_dir();
		}

		return static::$config_dir;
	}

	/**
	 * Gets the includes directory
	 *
	 * @return string
	 */
	public static function get_inc_dir() {

		if ( is_null(static::$inc_dir) ) {
			static::set_inc_dir();
		}

		return static::$inc_dir;
	}

	/**
	 * Gets the app asset directory
	 *
	 * @return string
	 */
	public static function get_assets_dir() {

		if ( is_null(static::$assets_dir) ) {
			static::set_assets_dir();
		}

		return static::$assets_dir;
	}

	/**
	 * Gets the app src directory
	 *
	 * @return string
	 */
	public static function get_src_dir() {

		if ( is_null(static::$src_dir) ) {
			static::set_src_dir();
		}

		return static::$src_dir;
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
	 * Gets the app blocks directory
	 *
	 * @return string
	 */
	public static function get_blocks_dir() {

		if ( is_null(static::$blocks_dir) ) {
			static::set_blocks_dir();
		}

		return static::$blocks_dir;
	}

	/**
	 * Gets the app language directory
	 *
	 * @return string
	 */
	public static function get_lang_dir() {

		if ( is_null(static::$lang_dir) ) {
			static::set_lang_dir();
		}

		return static::$lang_dir;
	}

	/**
	 * Gets the app vendor directory
	 *
	 * @return string
	 */
	public static function get_vendor_dir() {

		if ( is_null(static::$vendor_dir) ) {
			static::set_vendor_dir();
		}

		return static::$vendor_dir;
	}

	/**
	 * Gets the mix manifest content
	 *
	 * @return array | false
	 */
	private static function get_mix_manifest() {

		if ( is_null(static::$mix_manifest) ) {
			static::set_mix_manifest();
		}

		return static::$mix_manifest;
	}

	/**
	 * Gets the WBL App version
	 *
	 * @return string
	 */
	private static function get_wbl_app_version() {

		if ( is_null(static::$wbl_app_version) ) {
			static::set_wbl_app_version();
		}

		return static::$wbl_app_version;
	}


	/*=============================================================*/
	/**                        Setters                             */
	/*=============================================================*/


	/**
	 * Sets the app id
	 *
	 * @return void
	 */
	private static function set_id() {

		# Try to get value from arguments
		$id = static::$args['id'];

		if ( ! $id ) {

			# Automattically assign id based on the name of the folder
			$id = static::get_slug();
		}

		static::$id = $id;
	}

	/**
	 * Sets the app slug
	 *
	 * @return void
	 */
	private static function set_slug() {

		# Get slug from expected folder structure (<app-slug>/vendor/wbl-app.php)
		$slug = basename(dirname(dirname(__FILE__)));

		static::$slug = $slug;
	}

	/**
	 * Sets the app file (root file)
	 *
	 * @return void
	 */
	private static function set_type() {
		$type = null;

		if ( strpos( __FILE__, '/themes/' ) !== false ) {
			$type = 'theme';
		}
		else {
			$type = 'plugin';
		}

		static::$type = $type;
	}

	/**
	 * Sets the app name
	 *
	 * @return void
	 */
	private static function set_name() {

		# Try to get value from arguments
		$name = static::$args['name'];

		if ( ! $name ) {
			if (static::is_theme()) {
				$name = wp_get_theme()->get('Name') ?? $name;
			}
			else {

				$name = get_file_data( static::get_meta_file(), ['Name' => 'Plugin Name'] )['Name'] ?? $name;
				# Note: Can't use `get_plugin_data()` because it doesn't work on the frontend
			}
		}

		static::$name = $name;
	}

	/**
	 * Sets the app file (root file)
	 *
	 * @return void
	 */
	private static function set_meta_file() {

		$meta_file = '';

		if (static::is_theme()) {
			$meta_file = get_theme_file_path('style.css');
		}

		else {

			# Get plugin file by looking up plugin folder and checking for index.php or <plugin-slug>.php
			$plugin_slug = static::get_slug();

			if ( file_exists( static::get_path() . "{$plugin_slug}.php" ) ) {
				$meta_file = static::get_path() . "{$plugin_slug}.php";
			}
			elseif ( file_exists( static::get_path() . "index.php" ) ) {
				$meta_file = static::get_path() . "index.php";
			}
		}

		static::$meta_file = $meta_file;
	}

	/**
	 * Sets the app directory (with trailing slash)
	 *
	 * @return void
	 */
	private static function set_path() {

		# We expect this file to be in /dir/vendor.
		$path = str_replace( 'vendor', '', dirname(__FILE__) );

		static::$path = $path;
	}

	/**
	 * Sets the app URI (with trailing slash)
	 *
	 * @return void
	 */
	private static function set_uri() {

		if (static::is_theme()) {
			$uri = trailingslashit( get_theme_file_uri() );
		}
		else {
			$uri = plugin_dir_url( static::get_path() );
		}

		static::$uri = $uri;
	}

	/**
	 * Sets the app version
	 *
	 * @return void
	 */
	private static function set_version() {

		$version = '';

		if (static::is_theme()) {
			$version = wp_get_theme()->get('Version') ?? $version;
		}
		else {
			$version = get_file_data( static::get_meta_file(), array('Version' => 'Version') )['Version'] ?? $version;
			# Note: Can't use `get_plugin_data()` because it doesn't work on the frontend
		}

		static::$version = $version;
	}

	/**
	 * Sets the app includes directory
	 *
	 * @return void
	 */
	private static function set_inc_dir() {

		# Try to get value from arguments
		$inc_dir = static::$args['inc_dir'];

		# Not leading and trailing slashes
		$inc_dir = trim($inc_dir, '/');

		static::$inc_dir = $inc_dir;
	}

	/**
	 * Sets the app config directory
	 *
	 * @return void
	 */
	private static function set_config_dir() {

		# Try to get value from arguments
		$config_dir = static::$args['config_dir'];

		# Not leading and trailing slashes
		$config_dir = trim($config_dir, '/');

		static::$config_dir = $config_dir;
	}

	/**
	 * Sets the app asset directory
	 *
	 * @return void
	 */
	private static function set_assets_dir() {

		# Try to get value from arguments
		$assets_dir = static::$args['assets_dir'];

		# Not leading and trailing slashes
		$assets_dir = trim($assets_dir, '/');

		static::$assets_dir = $assets_dir;
	}

	/**
	 * Sets the app src directory
	 *
	 * @return void
	 */
	private static function set_src_dir() {

		# Try to get value from arguments
		$src_dir = static::$args['src_dir'];

		# Not leading and trailing slashes
		$src_dir = trim($src_dir, '/');

		static::$src_dir = $src_dir;
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

	/**
	 * Sets the app blocks directory
	 *
	 * @return void
	 */
	private static function set_blocks_dir() {

		# Try to get value from arguments
		$blocks_dir = static::$args['blocks_dir'];

		# Not leading and trailing slashes
		$blocks_dir = trim($blocks_dir, '/');

		static::$blocks_dir = $blocks_dir;
	}

	/**
	 * Sets the app language directory
	 *
	 * @return void
	 */
	private static function set_lang_dir() {

		# Try to get value from arguments
		$lang_dir = static::$args['lang_dir'];

		# Not leading and trailing slashes
		$lang_dir = trim($lang_dir, '/');

		static::$lang_dir = $lang_dir;
	}

	/**
	 * Sets the app vendor directory
	 *
	 * @return void
	 */
	private static function set_vendor_dir() {

		# Try to get value from arguments
		$vendor_dir = static::$args['vendor_dir'];

		# Not leading and trailing slashes
		$vendor_dir = trim($vendor_dir, '/');

		static::$vendor_dir = $vendor_dir;
	}

	/**
	 * Sets the mix manifest content
	 *
	 * @return void
	 */
	private static function set_mix_manifest() {

		# Get mix manifest file
		$manifest = static::asset_path( 'mix-manifest.json' );

		# Get the contents of the manifest
		$manifest = file_exists( $manifest ) ? json_decode( file_get_contents( $manifest ), true ) : false;

		# Set manifest
		static::$mix_manifest = $manifest;
	}

	/**
	 * Sets the WBL app version
	 *
	 * @return void
	 */
	private static function set_wbl_app_version() {

		$wbl_app_version = get_file_data( __FILE__, [ 'Version' => 'Version' ] )['Version'] ?? '';

		static::$wbl_app_version = $wbl_app_version;
	}


	/*=============================================================*/
	/**                       Utilities                            */
	/*=============================================================*/

	/**
	 * Bootstrap the app
	 *
	 * @return boolean
	 */
	public static function bootstrap() {
		
		if ( file_exists(static::inc_path( 'bootstrap.php' )) ) {
			require_once( static::inc_path( 'bootstrap.php' ) );
		}
	}

	/**
	 * Check if this app is a theme
	 *
	 * @return boolean
	 */
	public static function is_theme() {
		return static::get_type() == 'theme';
	}

	/**
	 * Check if this app is a plugin
	 *
	 * @return boolean
	 */
	public static function is_plugin() {
		return static::get_type() == 'plugin';
	}

	/**
	 * Includes and returns a given PHP config file. The file must return
	 * an array.
	 *
	 * @param  string  $name
	 * @return array
	 */
	public static function config( $name, $key = null, $key_2 = null ) {

		# Get config file
		$file = static::file_path( static::get_config_dir() . "/{$name}.php" );

		# Get config data
		$config = file_exists( $file ) ? include( $file ) : [];

		# Get key value
		if ($key) {

			# Get nested key value
			if ($key_2) {
				$config = $config[$key][$key_2] ?? null;
			}

			# Just get key value
			else {
				$config = $config[$key] ?? null;
			}
		}

		return $config;
	}

	/**
	 * Get the file-path within this app
	 *
	 * @param string $relative_file relative to this app root
	 * @return string filepath
	 */
	public static function file_uri( $relative_file = '' ) {
		return static::get_uri() . $relative_file;
	}

	/**
	 * Get the file-path within this app
	 *
	 * @param string $relative_file relative to this app root
	 * @return string filepath
	 */
	public static function file_path( $relative_file = '' ) {
		return static::get_path() . $relative_file;
	}

	/**
	 * Get the includes path
	 *
	 * @param string $relative_file relative to the includes directory
	 * @return string filepath
	 */
	public static function inc_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_inc_dir() . $relative_file );
	}

	/**
	 * Get the asset uri
	 *
	 * @param string $relative_file relative to the asset directory
	 * @return string filepath
	 */
	public static function asset_uri( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_uri( static::get_assets_dir() . $relative_file );
	}

	/**
	 * Get the asset path
	 *
	 * @param string $relative_file relative to the asset directory
	 * @return string filepath
	 */
	public static function asset_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_assets_dir() . $relative_file );
	}

	/**
	 * Get the src path
	 *
	 * @param string $relative_file relative to the src directory
	 * @return string filepath
	 */
	public static function src_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_src_dir() . $relative_file );
	}

	/**
	 * Get the template path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string filepath
	 */
	public static function template_path( $relative_file = '' ) {

		# Add relative template path
		$relative_file = static::template( $relative_file );

		return static::file_path( $relative_file );
	}

	/**
	 * Get the blocks path
	 *
	 * @param string $relative_file relative to the blocks directory
	 * @return string filepath
	 */
	public static function blocks_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_blocks_dir() . $relative_file );
	}

	/**
	 * Get the language path
	 *
	 * @param string $relative_file relative to the language directory
	 * @return string filepath
	 */
	public static function lang_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_lang_dir() . $relative_file );
	}

	/**
	 * Get the vendor path
	 *
	 * @param string $relative_file relative to the vendor directory
	 * @return string filepath
	 */
	public static function vendor_path( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::file_path( static::get_vendor_dir() . $relative_file );
	}

	/**
	 * Generate handle
	 *
	 * @return string $handle
	 */
	public static function handle( $append = '' ) {

		$handle = static::get_id();

		if ($append) {
			$handle .= "-{$append}";
		}

		return $handle;
	}

	/**
	 * Get asset with cachebusting if it's enabled by laravel mix
	 *
	 * @param string $file relative to the asset folder
	 * @return string filepath
	 */
	public static function asset( $file ) {

		# Make sure to trim any slashes from the front of the path.
		$file = '/' . ltrim( $file, '/' );

		# Get manifest
		$manifest = static::get_mix_manifest();

		# If a file is in the manifest, add the cache-busting path
		if ( $manifest && isset( $manifest[ $file ] ) ) {
			$file = $manifest[ $file ];
		}

		return static::asset_uri( $file );
	}

	/**
	 * Get SVG markup
	 *
	 * @param string name of the SVG icon
	 * @return string svg-markup
	 */
	public static function svg( $name = '' ) {

		$svg = '';

		if ($name) {
			$svg = file_get_contents( static::asset( "svg/{$name}.svg" ) );
			$svg = ($svg) ? $svg : '';
		}

		return $svg;
	}

	/**
	 * Get the template relative path
	 *
	 * @param string $relative_file relative to the template directory
	 * @return string relative filepath
	 */
	public static function template( $relative_file = '' ) {

		# Make sure we have a slash at the front of the path.
		$relative_file = '/' . ltrim( $relative_file, '/' );

		return static::get_template_dir() . $relative_file;
	}

	/**
	 * Render template file
	 */
	public static function render_template( $template, $name = null, $args = null ) {

		ob_start();

		static::display_template( $template, $name, $args);

		return ob_get_clean();
	}

	/**
	 * Display template file
	 */
	public static function display_template( $template, $name = null, $args = null ) {

		App::log($template);

		# Allow theme to override arguments
		$args = apply_filters( "wbl/template/args", $args, $template, $name);
		$args = apply_filters( "wbl/template/{$template}/args", $args, $template, $name);

		# Add relative template path
		$template = static::template( $template );

		get_template_part( $template, $name, $args );
	}

	/**
	 * Check whether the site is in debug mode.
	 */
	public static function is_debug_mode() {

		$environment = wp_get_environment_type();

		$is_debug_mode = ($environment == 'development' || $environment == 'staging');

		/**
		 * In the future I could also flag environment as development on 'staging' and 'production'
		 * when the logged-in user is developer or designer (check for Het Weblokaal email)
		 */

		return $is_debug_mode;
	}

	/**
	 * Check whether the site is local or online
	 */
	public static function is_local_environment() {

		# We assume we are online
		$is_local_environment = false;

		# Parse domain
	    $domain_array = explode(".", $_SERVER['SERVER_NAME']);
	    $domain_extension = end($domain_array);

	    # Check domain_extension
	    if ($domain_extension == 'test' || $domain_extension == 'dev') {
	    	$is_local_environment = true;
	    }

	    # Or check if localhost
	    elseif ( strpos( $_SERVER['SERVER_NAME'], 'localhost' ) !== false ) {
	    	$is_local_environment = true;
	    }

		return $is_local_environment;
	}

	/**
	 * Log data to wp-content/debug.log
	 *
	 * It doesn't matter if WP_DEBUG is true because I also want to be able
	 * to log on production environment (which has WP_DEBUG disabled)
	 */
	public static function log( $data, $show_namespace = false )  {

	    if ( is_array( $data ) || is_object( $data ) ) {

			if ($show_namespace) {
				error_log( '[' . __NAMESPACE__ . '] ...' );
			}

	        error_log( print_r( $data, true ) );
	    } else {

	    	if ($show_namespace) {
	    		$data = '[' . __NAMESPACE__ . '] ' . $data;
	    	}

	        error_log( $data );
	    }
	}

	/**
	 * Dump (print) data somewhere on the website
	 */
	public static function dump( $data, $show_namespace = false )  {
	    if ( static::is_debug_mode() ) {
	        if ( is_array( $data ) || is_object( $data ) ) {
	            print_r( $data, true );
	        } else {
	            echo $data;
	        }
	    }
	}

	/**
	 * Log data to wp-content/debug.log
	 *
	 * It doesn't matter if WP_DEBUG is true because I also want to be able
	 * to log on production environment (which has WP_DEBUG disabled)
	 */
	public static function status_log()  {

	    # Set properties
		static::log( '' );
		static::log( '====== START: APP STATUS LOG ======' );
		static::log( '' );
		static::log( '' );
		static::log( 'MAIN INFO' );
		static::log( '' );
		static::log( '   id:        ' . static::get_id() );
		static::log( '   type:      ' . static::get_type() );
		static::log( '   name:      ' . static::get_name() );
		static::log( '   meta_file: ' . static::get_meta_file() );
		static::log( '   version:   ' . static::get_version() );
		static::log( '' );
		static::log( '' );
		static::log( 'PATHS & URLS' );
		static::log( '' );
		static::log( '   path:         ' . static::get_path() );
		static::log( '   uri:          ' . static::get_uri() );
		static::log( '   config_dir:   ' . static::get_config_dir() );
		static::log( '   inc_dir:      ' . static::get_inc_dir() );
		static::log( '   assets_dir:   ' . static::get_assets_dir() );
		static::log( '   src_dir:      ' . static::get_src_dir() );
		static::log( '   vendor_dir:   ' . static::get_vendor_dir() );
		static::log( '   template_dir: ' . static::get_template_dir() );
		static::log( '   blocks_dir:   ' . static::get_blocks_dir() );
		static::log( '' );
		static::log( '' );
		static::log( 'APP CLASS' );
		static::log( '' );
		static::log( '   namespace: ' . __NAMESPACE__ );
		static::log( '   file:      ' . __FILE__ );
		static::log( '   version:   ' . static::get_wbl_app_version() );
		static::log( '' );
		static::log( '' );
		static::log( '======= END: APP STATUS LOG =======' );
		static::log( '' );
	}
}

/****

Changelog

1.0-alpha-12
- Improve handle method to show only the id when no custom handle is given

1.0-alpha-11
- Add check whether the environment is local

1.0-alpha-10
- Small improvement of svg method

1.0-alpha-9
- Corrected the mistake of the effort to make this class centralized

1.0-alpha-8
- Big change: store data in apps array to prevent conflict between data

1.0-alpha-7
- Improve status_log

1.0-alpha-6
- Set namespace to WBL
- Prevent class from loading if it already exists

1.0-alpha-5
- Add filter to override template arguments

1.0-alpha-4
- Add function to get relative template file path

1.0-alpha-3
- Add support for App name
- Allow id to be loaded from config

1.0-alpha-2
- Add support for language directory
- Add changelog to bottom of file

****/
