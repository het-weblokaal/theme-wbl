/***
 * Laravel Mix configuration file.
 *
 * Laravel Mix is a layer built on top of WordPress that simplifies much of the
 * complexity of building out a Webpack configuration file. Use this file to
 * configure how your assets are handled in the build process.
 *
 * @link https://laravel-mix.com/docs/6.0/installation
 * @link https://laravel.com/docs/6.x/mix
 */

// Import required packages.
const mix = require( 'laravel-mix' );

/**
 * Sets the development path to assets. By default, this is the `/assets`
 * folder in the theme.
 */
const devPath  = 'src';
const pubPath  = 'assets';

/**
 * Sets the path to the generated assets. By default, this is the `/dist` folder
 * in the theme. If doing something custom, make sure to change this everywhere.
 */
mix.setPublicPath( pubPath );

/**
 * Set Laravel Mix options.
 *
 * @link https://laravel-mix.com/docs/5.0/options
 * @link https://laravel.com/docs/6.x/mix#postcss
 * @link https://laravel.com/docs/6.x/mix#url-processing
 * @link https://github.com/csstools/postcss-preset-env
 */
mix.options( {
	postCss : [
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
 * @link https://laravel.com/docs/6.x/mix#css-source-maps
 */
if (! mix.inProduction()) {
	mix.sourceMaps();
}

/**
 * Versioning and cache busting. Append a unique hash for production assets. If
 * you only want versioned assets in production, do a conditional check for
 * `mix.inProduction()`.
 *
 * @link https://laravel.com/docs/6.x/mix#versioning-and-cache-busting
 */
mix.version();

/**
 * Compile JavaScript.
 *
 * @link https://laravel.com/docs/6.x/mix#working-with-scripts
 */
mix.js( `${devPath}/js/polyfill.js`,     'js' )
   .js( `${devPath}/js/theme.js`,        'js' )
   .js( `${devPath}/js/block-editor.js`, 'js' );

/**
 * Compile CSS. We use Sass to make our code more understandable. Though we 
 * don't use all the complexity Sass has to offer. Mainly for comments and
 * combination. After Sass laravel mix will run PostCSS with the options above.
 *
 * @link https://laravel.com/docs/6.x/mix#working-with-stylesheets
 */
mix.sass( `${devPath}/scss/style.scss`,        'css' )
   .sass( `${devPath}/scss/editor-style.scss`, 'css' );

