/**
 * WordPress dependencies
 */
const {	InnerBlocks } = wp.blockEditor;

/**
 * Edit function
 */
function edit( { attributes } ) {

	// Setup variables
	const blockClassName = "wbl-simple-container";

	return (
		<div className={ `${blockClassName}` }>
			<InnerBlocks
				orientation="horizontal"
				templateLock={ false }
			/>
		</div>
	);
}

export default edit;
