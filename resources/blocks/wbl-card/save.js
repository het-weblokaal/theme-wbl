/**
 * Internal dependencies
 */

/**
 * WordPress dependencies
 */
const { RichText } = wp.blockEditor;

/**
 * Save function
 */
function save( { attributes } ) {

	// Setup variables
	const heading        = attributes.heading;
	const headingLevel   = attributes.headingLevel;
	const headingTagName = 'h' + attributes.headingLevel;
	const blockClassName = "wbl-card";
	const imageSrc       = attributes.imageSrc;
	const text           = attributes.text;

	return (
		<div className={ `${blockClassName}` }>
			<RichText.Content tagName={ headingTagName } className={ `${blockClassName}__heading` } value={ heading } />
			<figure className={ `${blockClassName}__image-container` }>
				<img className={ `${blockClassName}__image` } src={ imageSrc } />
			</figure>
			<RichText.Content tagName={ 'div' } className={ `${blockClassName}__text` } multiline value={ text } />
		</div>
	);
}

export default save;
