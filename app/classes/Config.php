<?php
/**
 * Config Class.
 *
 * A simple class for grabbing and returning a configuration file from `/config`.
 *
 * @link      https://themehybrid.com/themes/exhale
 */

namespace Theme_WBL;

/**
 * Config class.
 *
 * @since  1.0.0
 * @access public
 */
class Config {

	/**
	 * Includes and returns a given PHP config file. The file must return
	 * an array.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $name
	 * @return array
	 */
	public static function get( $name, $key = null ) {

		$file = static::path( "{$name}.php" );

		$config = (array) apply_filters(
			"wbl-theme/config/{$name}",
			file_exists( $file ) ? include( $file ) : []
		);

		// Get key value
		if ($key) {
			$config = $config[$key] ?? [];
		}

		return $config;
	}

	/**
	 * Returns the config path or file path if set.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $file
	 * @return string
	 */
	public static function path( $file = '' ) {

		$file = trim( $file, '/' );

		return App::get_file_path( $file ? "config/{$file}" : 'config' );
	}
}
