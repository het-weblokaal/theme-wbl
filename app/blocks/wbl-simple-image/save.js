/**
 * WordPress dependencies
 */

/**
 * Save function
 */
function save( { attributes } ) {

	const src            = attributes.src;
	const size           = attributes.size;
	const id             = attributes.id;
	const blockClassName = "wbl-simple-image";

	return (
		<figure className={ blockClassName }>
			<img src={ src } />
		</figure>
	);
};

export default save;
