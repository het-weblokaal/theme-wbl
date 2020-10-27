<?php

namespace Theme_WBL;

/**
 * Theme Dependencies Class
 *
 * Uses TGMPA plugin
 */
final class ThemeDependencies {

	/**
	 * Register the required plugins for this theme.
	 *
	 * @link https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/example.php
	 */
	public static function setup() {

		$tgmpa = Config::get('theme-dependencies');

		$tgmpa_plugins = $tgmpa['plugins'] ?? [];
		$tgmpa_config = $tgmpa['config'] ?? [];

		tgmpa( $tgmpa_plugins, $tgmpa_config );
	}

}
