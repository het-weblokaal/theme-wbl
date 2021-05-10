/**
 * Primary front-end script.
 */

import siteNavToggle from './site-nav-toggle.js';
import dynamicLoad from './dynamic-load.js';

siteNavToggle.init({
	toggleSelector : '.site-nav-toggle',
    targetSelector : '.site-nav'
});

// Check whether this is IE and add IE11 stylesheet
if (window.document.documentMode) {
	dynamicLoad.stylesheet("/wp-content/themes/theme-wbl/public/css/ie11-style.css?ver="+theme.version);
	dynamicLoad.unloadStylesheet("theme-wbl-css");
}
