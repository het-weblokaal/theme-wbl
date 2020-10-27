<?php

namespace Theme_WBL;

/**
 * Theme Support Class
 */
final class ThemeSupport {

	/**
	 * Use theme-support config file to setup theme-support
	 *
	 * Allows filtering of features
	 */
	public static function setup() {

		$theme_support = Config::get('theme-support');

		foreach ($theme_support['add'] as $key => $value) {

			$feature = $key;
			$args    = $value;

			// Check if numbered array and make the value the feature
			if (is_int($key)) {
				$feature = $value;
				$args    = null;
			}

			// Override arguments of feature
			$args = apply_filters( "hwl/add-theme-support/$feature", $args );

			if ( is_null($args) ) {
				add_theme_support( $feature );
			}
			else {
				add_theme_support( $feature, $args );
			}
		}

		foreach ($theme_support['remove'] as $feature) {

			if ( apply_filters( "hwl/remove-theme-support/$feature", true) ) {
				remove_theme_support( $feature );
			}
		}
	}

}
