/***
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of WordPress that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file to
 * configure how your assets are handled in the build process.
 *
 * @link https://laravel-mix.com/docs/5.0/installation
 * @link https://laravel.com/docs/5.6/mix
 *
 * @package   Ejo\Theme\Erik
 * @author    Erik Joling <erik@joling.me>
 * @copyright 2020 Erik Joling
 * @link      https://erik.joling.me/
 */

// Import required packages.
const mix = require( 'laravel-mix' );

// Prevent webpack to copy media files each time (when changing css/js)
const processMedia = ! process.env.nomedia;

// Only build IE in certain cases
const processIE11 = ! process.env.noIE11;

/**
 * Sets the development path to assets. By default, this is the `/assets`
 * folder in the theme.
 */
const devPath  = 'resources';
const pubPath  = 'public';

/**
 * Sets the path to the generated assets. By default, this is the `/dist` folder
 * in the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath( pubPath );

/**
 * Set Laravel Mix options.
 *
 * @link https://laravel-mix.com/docs/5.0/options
 * @link https://laravel.com/docs/5.6/mix#postcss
 * @link https://laravel.com/docs/5.6/mix#url-processing
 * @link https://github.com/csstools/postcss-preset-env
 */
mix.options( {
	postCss : [
		require( 'postcss-import' )(),
		require( 'postcss-mixins' )(),
		require( 'postcss-nested' )(),
		require( 'postcss-preset-env' )({
			stage: 2,
			features: {
				'custom-media-queries': true
			}
		})
	],
	processCssUrls : false
} );

/**
 * Builds sources maps for assets. Only when not in production
 *
 * @link https://laravel.com/docs/5.6/mix#css-source-maps
 */
if (! mix.inProduction()) {
	mix.sourceMaps();
}

/**
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 */
mix.version();

/**
 * Compile JavaScript.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-scripts
 */
mix.js( `${devPath}/js/polyfill.js`,     'js' )
   .js( `${devPath}/js/theme.js`,        'js' )
   .js( `${devPath}/js/block-editor.js`, 'js' );

/**
 * Compile CSS. Mix supports Sass, Less, Stylus, and plain CSS, and has functions
 * for each of them.
 *
 * @link https://laravel.com/docs/5.6/mix#working-with-stylesheets
 */
mix.postCss( `${devPath}/css/style.css`,             'css' )
   .postCss( `${devPath}/css/editor-style.css`,      'css' );
   // .postCss( `${devPath}/css/ie11-style.css`,      'css' );

if ( processIE11 ) {
	mix.postCss( `${devPath}/css/ie11-style.css`, 'css', [
		require( 'postcss-import' )(),
		require( 'postcss-mixins' )(),
		require( 'postcss-nested' )(),
		require( 'postcss-preset-env' )({
			browsers: 'IE 11',
			stage: 2,
			features: {
				'custom-media-queries': true
			}
		})
	]);
}

/**
 * Copy images and fonts to public
 *
 * @link https://laravel-mix.com/docs/master/copying-files
 */
if ( processMedia ) {
	mix.copy( `${devPath}/img/*`,   `${pubPath}/img` )
	   .copy( `${devPath}/svg/*`,   `${pubPath}/svg` )
	   .copy( `${devPath}/fonts/`,  `${pubPath}/fonts`, false );
}


/**
 * Gutenberg blocks
 */
mix.react(   `${devPath}/blocks/blocks.js`,         'js'  )
   .postCss( `${devPath}/blocks/blocks.editor.css`, 'css' );
