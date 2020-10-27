/**
 * External dependencies
 */
const { get, filter, map, pick } = lodash;

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { InspectorControls, MediaUpload } = wp.blockEditor;
const {	PanelBody, SelectControl, Button } = wp.components;
const {	useSelect } = wp.data;

/**
 * Internal dependencies
 */
import { getImageSrc } from '../utils.js';

/**
 * Edit function
 */
function edit( {attributes, setAttributes, isSelected} ) {

	// Setup variables
	const id             = attributes.id; // attachment id
	const src            = attributes.src;
	const size           = attributes.size ?? 'thumbnail';
	const blockClassName = "wbl-simple-image";

	const image = useSelect( ( select ) => {
			const { getMedia } = select( 'core' );
			return id && isSelected ? getMedia( id ) : null;
		},
		[ id, isSelected ]
	);

	// const {	imageSizes } = useSelect( ( select ) => {
	// 	const { getSettings } = select( 'core/block-editor' );
	// 	return pick( getSettings(), [
	// 		'imageSizes',
	// 	] );
	// } );
	const sizeOptions = [
		{ label : 'Thumbnail', value : 'thumbnail' },
		{ label : 'Medium', value : 'medium' },
		{ label : 'Large', value : 'large' },
		{ label : 'Full', value : 'full' },
		{ label : 'Responsive (WIP)', value : 'responsive' }
	];

	function setImage( media ) {
		setAttributes( {
			id   : media.id ?? undefined,
			src  : getImageSrc(media, size)
		} );
	}

	function updateImageSize( newSize ) {

		const newSrc = get( image, [
			'media_details',
			'sizes',
			(newSize == 'responsive') ? 'thumbnail' : newSize,
			'source_url',
		] );

		if ( ! newSrc ) {
			return null;
		}

		setAttributes( {
			src: newSrc,
			size: newSize,
		} );
	}

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<SelectControl
						label={ __( 'Image size', 'theme-wbl' ) }
						help={ __( 'Choose the right image size.', 'theme-wbl' ) }
						value={ size }
						onChange={ updateImageSize }
						options={ sizeOptions }
					/>
				</PanelBody>
			</InspectorControls>
			{
				(!! src) &&
				<figure className={ blockClassName }>
					<img src={ src } alt="" />
				</figure>
			}
			<MediaUpload
				onSelect = { ( media ) => setImage( media ) }
				allowedTypes = { [ 'image' ] }
				render={ ( { open } ) => (
					<Button isSecondary onClick={ open }>
						{ !! src ? __( 'Change image', 'theme-wbl' ) : __( 'Set image', 'theme-wbl' ) }
					</Button>
				) }
			/>
		</>
	);
};

export default edit;
