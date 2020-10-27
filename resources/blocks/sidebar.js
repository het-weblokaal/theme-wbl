/**
 * Need to grasp this subject more
 *
 * Examples:
 * Author selector: https://github.com/WordPress/gutenberg/blob/master/packages/editor/src/components/post-author/index.js
 */

/**
 * WordPress dependencies
 */
const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { __ } = wp.i18n;

const CallToActionChoice = () => (
    <PluginDocumentSettingPanel
        name="custom-panel"
        title="Page"
        className="custom-panel"
    >
    	Test
    </PluginDocumentSettingPanel>
);

registerPlugin( 'call-to-action-choice', {
    render: CallToActionChoice,
    icon: 'phone',
} );
