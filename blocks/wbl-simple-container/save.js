/**
 * Internal dependencies
 */

/**
 * WordPress dependencies
 */
const { InnerBlocks } = wp.blockEditor;

/**
 * Save function
 */
function save( { attributes } ) {

	// Setup variables
	const blockClassName = "wbl-simple-container";

	return (
		<div className={ `${blockClassName}` }>
			<InnerBlocks.Content />
		</div>
	);
}

export default save;
