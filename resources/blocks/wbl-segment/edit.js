/**
 * WordPress dependencies
 */
const {	InnerBlocks, InspectorControls, RichText } = wp.blockEditor;
const {	ExternalLink, PanelBody, PanelRow, SelectControl, ToggleControl } = wp.components;
const { __ } = wp.i18n;
// const { withSelect } = wp.data;

/**
 * Internal dependencies
 */
import HeadingToolbar from './heading-toolbar';

/**
 * Edit function
 */
function edit( { attributes, setAttributes } ) {

	// Setup variables
	const heading        = attributes.heading;
	const headingLevel   = attributes.headingLevel;
	const headingTagName = 'h' + attributes.headingLevel;
	const showHeading    = attributes.showHeading;
	const tagName        = attributes.tagName || "div";
	const allowedBlocks  = attributes.allowedBlocks || undefined;
	const orientation    = attributes.orientation || "horizontal";
	const blockClassName = "wbl-segment";
	const variationClassName = attributes.variation ? blockClassName + '--' + attributes.variation : '';

	console.log(orientation);

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<ToggleControl
						label={ __( "Show Heading", 'theme-wbl' ) }
						checked={ showHeading }
						onChange={ ( value ) => {
							setAttributes( { showHeading: value } )
						} }
					/>
					{
						(showHeading) &&
						<HeadingToolbar
							isCollapsed={ false }
							minLevel={ 1 }
							maxLevel={ 3 }
							selectedLevel={ headingLevel }
							onChange={ ( newHeadingLevel ) => {
								setAttributes( { headingLevel: newHeadingLevel } )
							} }
						/>
					}
					<SelectControl
						label={ __( 'Tag name', 'theme-wbl' ) }
						help={
							<>
								{ __( 'Choosing the right semantic tag improves SEO and Accessibilty.', 'theme-wbl' ) }

								<ExternalLink href={ 'http://html5doctor.com/you-can-still-use-div/' }>
									{ __( 'Learn more about semantic HTML5', 'theme-wbl' ) }
								</ExternalLink>
							</>
						}
						value={ tagName }
						onChange={ ( newTagName ) => {
							setAttributes( { tagName: newTagName } )
						} }
						options={ [
							{ label: 'div', 	value: 'div' },
							{ label: 'section', value: 'section' },
							{ label: 'aside', 	value: 'aside' },
							{ label: 'article', value: 'article' }
						] }
					/>
				</PanelBody>
			</InspectorControls>
			<div className={ `${blockClassName} ${variationClassName}` }>
	        	<div className={ `${blockClassName}__inner` }>
					{
						(showHeading) &&
						<RichText
							className={ `${blockClassName}__title` }
							tagName={ headingTagName }
							value={ heading }
							onChange={ ( newHeading ) => { setAttributes( { heading: newHeading } ) } }
							placeholder={ __( 'Heading', 'theme-wbl' ) }
							keepPlaceholderOnFocus={true}
							allowedFormats={ [] }
						/>
					}
	        		<div className={ `${blockClassName}__content` }>
	        			<InnerBlocks
							allowedBlocks={ allowedBlocks }
							template={ [ 'core/paragraph' ] }
							templateLock={ (allowedBlocks) ? false : "insert" }
							orientation={ orientation }
							renderAppender={ (allowedBlocks) ? InnerBlocks.ButtonBlockAppender : false }
						/>
					</div>
				</div>
			</div>
		</>
	);
}

export default edit;
