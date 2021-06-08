/**
 * WordPress dependencies
 */
const { has } = lodash;

/**
 * Get the source url of an image
 *
 * @return string
 */
export function getImageSrc( media, size ) {
	let imageSrc = '';

	size = size || 'thumbnail';

	if ( media ) {

		// The media object can be different I guess...
		// - Media with media_details and source_url
		// - Media with direct properties and url
		if ( has( media, [ 'media_details' ] ) ) {
			if ( has( media, [ 'media_details', 'sizes', size ] ) ) {
				imageSrc = media.media_details.sizes[ size ].source_url;
			} else {
				imageSrc = media.source_url;
			}
		}
		else {
			if ( has( media, [ 'sizes', size ] ) ) {
				imageSrc = media.sizes[ size ].url;
			} else {
				imageSrc = media.url;
			}
		}
	}

	return imageSrc;
}
