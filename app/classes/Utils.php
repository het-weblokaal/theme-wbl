<?php

namespace Theme_WBL;

/** TEST, BUT NOT IN USE */

/**
 * Utlility Class
 *
 * Class with utitities to use
 */
final class Utils {

	/**
	 * Public folder
	 *
	 * @var string
	 */
	private static $asset_dir = 'public';

	/**
	 * Laravel mix manifest
	 *
	 * @var string
	 */
	private static $mix_manifest = null;

	/**
	 * Constructor method.
	 *
	 * @return void
	 */
	private function __construct() {}


	/*=============================================================*/
	/**                    Class Properties                        */
	/*=============================================================*/

	/**
	 * Gets the mix manifest content
	 *
	 * @return array | false
	 */
	private static function get_mix_manifest() {

		// Get manifest
		if ( is_null(static::$mix_manifest) ) {
			static::set_mix_manifest();
		}

		// Set manifest
		return static::$mix_manifest;
	}

	/**
	 * Sets the mix manifest content
	 *
	 * @return void
	 */
	private static function set_mix_manifest() {

		// Get mix manifest file
		$manifest = App::get_file_path( static::$asset_dir . '/mix-manifest.json' );

		// Get the contents of the manifest
		$manifest = file_exists( $manifest ) ? json_decode( file_get_contents( $manifest ), true ) : false;

		// Set manifest
		static::$mix_manifest = $manifest;
	}


	/*=============================================================*/
	/**                       Utilities                            */
	/*=============================================================*/

	/**
	 * Get asset with cachebusting if it's enabled by laravel mix
	 *
	 * @param string $file relative to the asset folder
	 * @return string filepath
	 */
	public static function asset( $file ) {

		// Make sure to trim any slashes from the front of the path.
		$file = '/' . ltrim( $file, '/' );

		// Get manifest
		$manifest = static::get_mix_manifest();

		// If a file is in the manifest, add the cache-busting path
		if ( $manifest && isset( $manifest[ $file ] ) ) {
			$file = $manifest[ $file ];
		}

		return App::get_file_uri( static::$asset_dir . $file );
	}

	/**
	 * Get SVG markup
	 *
	 * @param string name of the SVG icon
	 * @return string svg-markup
	 */
	public static function svg( $name = '' ) {

		$svg = file_get_contents( static::asset( "svg/{$name}.svg" ) );

		return ($svg) ? $svg : '';
	}

	/**
	 * Checks if the environment is local
	 *
	 * @return string 'local' or 'online'
	 */
	public static function get_environment() {
		$environment = 'online';

		// Parse domain
	    $domain_array = explode(".", $_SERVER['SERVER_NAME']);
	    $domain_extension = end($domain_array);

	    // Check domain_extension
	    if ($domain_extension == 'test' || $domain_extension == 'dev') {
	    	$environment = 'local';
	    }

	    // Check if localhost
	    elseif ( strpos( $_SERVER['SERVER_NAME'], 'localhost' ) !== false ) {
	    	$environment = 'local';
	    }

	    return $environment;
	}

	/**
	 * Checks if the App version has development status
	 *
	 * @return string 'production' or 'development'
	 */
	public static function get_version_type() {
		$version_type = 'production';

		$version = App::get_version();

	    // Check if version is under version 1 or if it contains letters (dev, alpha, beta) and not RC (release candidate)
		if ( version_compare($version, "1", "<") || (preg_match( "/[a-zA-Z]/", $version) && !preg_match( "/rc/i", $version)) ) {
			$version_type = 'development';
		}

	    return $version_type;
	}

}
