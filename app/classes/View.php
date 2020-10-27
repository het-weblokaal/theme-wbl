<?php

namespace Theme_WBL;

/**
 * View Class
 *
 * Class to set view templates.
 */
final class View {

	/**
	 * The folder of the templates with trailing slash
	 *
	 * @var string
	 */
	private static $dir;


	/*=============================================================*/
	/**                        Getters                             */
	/*=============================================================*/

	public static function get_dir() {

		if (is_null(static::$dir)) {
			static::set_dir();
		}

		return static::$dir;
	}

	/*=============================================================*/
	/**                        Getters                             */
	/*=============================================================*/

	public static function set_dir() {
		$dir = apply_filters( 'wbl/view_dir', 'resources/views/' );

		static::$dir = trailingslashit($dir);
	}


	/*=============================================================*/
	/**                       Utilities                            */
	/*=============================================================*/

	/**
	 * Render template file
	 */
	public static function render( $template, $name = null, $args = null ) {

		ob_start();

		static::display( $template, $name, $args);

		return ob_get_clean();
	}

	/**
	 * Display template file
	 */
	public static function display( $template, $name = null, $args = null ) {

		get_template_part( static::get_dir() . $template, $name, $args );
	}
}
