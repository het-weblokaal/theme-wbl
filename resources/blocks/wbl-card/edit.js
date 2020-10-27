/**
 * WordPress dependencies
 */
const {	InspectorControls, RichText, MediaUpload } = wp.blockEditor;
const {	PanelBody, SelectControl, Button } = wp.components;
const { __ } = wp.i18n;

/**
 * Internal dependencies
 */
import { getImageSrc } from '../utils.js';

/**
 * Edit function
 */
function edit( { attributes, setAttributes } ) {

	// Setup variables
	const heading        = attributes.heading;
	const headingLevel   = attributes.headingLevel;
	const headingTagName = 'h' + attributes.headingLevel;
	const blockClassName = "wbl-card";
	const imageSrc       = attributes.imageSrc;
	const text           = attributes.text;

	function setImageSrc( media ) {
		setAttributes( { imageSrc: getImageSrc(media, 'medium') } );
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Heading settings', 'theme-wbl' ) } initialOpen={ true }>
					<SelectControl
						label={ __( 'Heading level', 'theme-wbl' ) }
						help={ __( 'Please choose the right heading level based on your document structure. This improves SEO and Accessibilty.', 'theme-wbl' ) }
						value={ headingLevel }
						onChange={ ( newHeadingLevel ) => {
							setAttributes( { headingLevel: newHeadingLevel } )
						} }
						options={ [
							{ label: 'Level 2', value: 2 },
							{ label: 'Level 3', value: 3 }
						] }
					/>
				</PanelBody>
			</InspectorControls>
			<div className={ `${blockClassName}` }>
	        	<div className={ `${blockClassName}__inner` }>
					<RichText
						className={ `${blockClassName}__heading` }
						tagName={ headingTagName }
						value={ heading }
						onChange={ ( newHeading ) => { setAttributes( { heading: newHeading } ) } }
						placeholder={ __( 'Heading', 'theme-wbl' ) }
						keepPlaceholderOnFocus={true}
						allowedFormats={ [] }
					/>
					{
						(!! imageSrc) &&
						<div className={ blockClassName + `__image-container` }>
							<img className={ blockClassName + `__image` } src={ imageSrc } alt="" />
						</div>
					}
					<MediaUpload
						onSelect = { ( media ) => setImageSrc( media ) }
						allowedTypes = { [ 'image' ] }
						render={ ( { open } ) => (
							<Button isSecondary onClick={ open }>
								{ !! imageSrc ? __( 'Change image', 'theme-wbl' ) : __( 'Set image', 'theme-wbl' ) }
							</Button>
						) }
					/>
        			<RichText
        				className={ `${blockClassName}__text` }
						identifier="text"
						multiline
						value={ text }
						onChange={ ( newValue ) => { setAttributes( { text: newValue } ) } }
						placeholder={
							// translators: placeholder text
							__( 'Write text…', 'theme-wbl' )
						}
					/>
				</div>
			</div>
		</>
	);
}

export default edit;
