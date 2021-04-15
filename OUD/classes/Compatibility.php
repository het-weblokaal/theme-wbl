<?php

namespace Theme_WBL;

/**
 * Offers an extendable class for adding easy compatibility
 *
 * This class should be extended and is not meant to be used independantly
 */
abstract class Compatibility {

	/**
	 * Namespace
	 *
	 * Example: \Ejo\Pack\
	 */
	protected static $namespace = null;

	/**
	 * Classname
	 */
	protected static $classname = null;

	/**
     * Constructor method.
     *
     * @return void
     */
    protected function __construct() {}

    /**
     * Get the namespace
     */
    public static function get_namespace() {
        return static::$namespace;
    }

    /**
     * Get the class name
     */
    public static function get_classname() {
        return static::$classname;
    }

	/**
	 * Abstract callback function to make compatibility methods less verbose
	 */
	protected static function callback( $method_name, $params = null, $fallback = '' ) {
		$value = false;

		$classname = static::get_classname();
		$namespace = static::get_namespace();

		if ( isset($classname) && method_exists("{$namespace}{$classname}", $method_name) ) {

			if ( is_null($params) ) {
				$value = call_user_func( array("{$namespace}{$classname}", $method_name) );
			}
			else {
				$value = call_user_func_array( array("{$namespace}{$classname}", $method_name), $params );
			}
		}

		return ($value) ? $value : $fallback;
	}
}
