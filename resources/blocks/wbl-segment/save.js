/**
 * Internal dependencies
 */

/**
 * WordPress dependencies
 */
const { RichText, InnerBlocks } = wp.blockEditor;

/**
 * Save function
 */
function save( { attributes } ) {

	// Setup variables
	const heading        = attributes.heading;
	const headingTagName = 'h' + attributes.headingLevel;
	const showHeading    = attributes.showHeading;
	const TagName        = attributes.tagName || "div"; // Because of syntax first letter must be capitalized
	const blockClassName = "wbl-segment";
	const variationClassName = attributes.variation ? blockClassName + '--' + attributes.variation : '';

	return (
		<TagName className={ `${blockClassName} ${variationClassName}` }>
			<div className={ `${blockClassName}__inner` }>
				{
					(showHeading) &&
						<RichText.Content tagName={ headingTagName } className={ `${blockClassName}__title` } value={ heading } />
				}
				<div className={ `${blockClassName}__content` }>
					<InnerBlocks.Content />
				</div>
			</div>
		</TagName>
	);
}

export default save;
