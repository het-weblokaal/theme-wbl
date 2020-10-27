/**
 * README
 *
 * Developer note: see https://material.io/components/cards for card content and restraints
 */

/**
 * External dependancies
 */
const { merge } = lodash;

// Imports
import metadata from './block.json';
import edit from './edit';
import save from './save';

// Get name from metadata
const { name } = metadata;

// Merge the metadata with the edit and save functions
const settings = merge(metadata, {
	edit: edit,
	save: save
});

// Export
export { name, settings };
