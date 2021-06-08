/**
 * WordPress dependencies
 */
const { Path, SVG } = wp.components;
const { __ } = wp.i18n;

/**
 * Template option choices for predefined columns layouts.
 */
const variations = [
	{
		name: 'wbl-theme/segment/two-column-text',
		title: __( 'Segment: Two Column Text', 'theme-wbl' ),
		description: __( 'WBL Segment with two column paragraphs', 'theme-wbl' ),
		isDefault: true,
		attributes: { variation: 'two-column-text', tagName: 'div' },
		innerBlocks: [
			[ 'core/paragraph', { 'placeholder' : 'Type your text' } ],
	    	[ 'core/paragraph', { 'placeholder' : 'Type your text' } ]
		],
		scope: [ 'block', 'inserter' ]
	},
	{
		name: 'wbl-theme/segment/portfolio',
		title: __( 'Segment: portfolio', 'theme-wbl' ),
		description: __( 'WBL Segment with a portfolio', 'theme-wbl' ),
		attributes: { variation: 'portfolio', tagName: 'section' },
		innerBlocks: [
			[ 'wbl-theme/simple-image' ],
			[ 'wbl-theme/simple-container', {}, [
		    	[ 'core/paragraph', { 'placeholder' : 'Type your text' } ],
		    	[ 'core/paragraph', { 'placeholder' : 'Link' } ]
		    ] ],
		],
		scope: [ 'block', 'inserter' ]
	},
	{
		name: 'wbl-theme/segment/featured-four',
		title: __( 'Segment: Featured Four', 'theme-wbl' ),
		description: __( 'WBL Segment with four columns', 'theme-wbl' ),
		attributes: { variation: 'featured-four', tagName: 'div', showHeading: false, allowedBlocks: [ "wbl-theme/card" ] },
		innerBlocks: [
			[ 'wbl-theme/card', {} ],
			[ 'wbl-theme/card', {} ],
			[ 'wbl-theme/card', {} ],
			[ 'wbl-theme/card', {} ]
		],
		scope: [ 'block', 'inserter' ]
	},
	{
		name: 'wbl-theme/segment/blog',
		title: __( 'Segment: Blog', 'theme-wbl' ),
		description: __( 'WBL Segment with Blog', 'theme-wbl' ),
		attributes: { variation: 'blog', tagName: 'section' },
		innerBlocks: [
			[ 'wbl-blocks/posts'],
		],
		scope: [ 'block', 'inserter' ]
	},
	{
		name: 'wbl-theme/segment/call-to-action',
		title: __( 'Segment: Call To Action', 'theme-wbl' ),
		description: __( 'WBL Segment with Call To Action', 'theme-wbl' ),
		attributes: { variation: 'call-to-action', showHeading: false, tagName: 'aside', orientation: false },
		innerBlocks: [
			[ 'core/heading', { level: 3 } ],
		    [ 'core/paragraph', { 'placeholder' : 'Type your text' } ]
		],
		scope: [ 'block', 'inserter' ]
	},
	{
		name: 'wbl-theme/segment/companies',
		title: __( 'Segment: Companies', 'theme-wbl' ),
		description: __( 'WBL Segment with Companies', 'theme-wbl' ),
		attributes: { variation: 'companies', tagName: 'section', allowedBlocks: [ "wbl-theme/simple-image" ] },
		innerBlocks: [
			[ 'wbl-theme/simple-image' ]
		],
		scope: [ 'block', 'inserter' ]
	}
];

export default variations;
