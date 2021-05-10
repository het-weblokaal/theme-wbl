/**
 * Gutenberg Blocks
 *
 * All blocks related JavaScript files should be imported here.
 * You can create a new block folder in this dir and include code
 * for that block here as well.
 *
 * All blocks should be included here since this is the file that
 * Webpack is compiling as the input file.
 */

/**
 * WordPress dependencies
 */
const { registerBlockType } = wp.blocks;

/**
 * Import blocks
 */
import * as wblSegment from './wbl-segment/index';
import * as wblCard from './wbl-card/index';
import * as wblSimpleContainer from './wbl-simple-container/index';
import * as wblSimpleImage from './wbl-simple-image/index';

/**
 * Register Blocks
 */
registerBlockType( wblSegment.name, wblSegment.settings );
registerBlockType( wblCard.name, wblCard.settings );
registerBlockType( wblSimpleContainer.name, wblSimpleContainer.settings );
registerBlockType( wblSimpleImage.name, wblSimpleImage.settings );

/**
 * Sidebar slots
 */
// import './sidebar';
