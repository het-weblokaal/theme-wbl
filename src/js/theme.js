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



/**
 * Grid toggle
 */
let gridToggle = document.querySelector('#grid-toggle');
let gridToggleTarget = document.querySelector('body');

if (gridToggle) {

    if (localStorage.getItem('hasGrid')) {
    	gridToggleTarget.classList.add('has-grid');
    	gridToggle.checked = true;
    }
    else {
    	gridToggle.textContent = false;
    }

    gridToggle.addEventListener('click', function(e) {
        // e.preventDefault();
        if (localStorage.getItem('hasGrid')) {
            gridToggleTarget.classList.remove('has-grid');
            gridToggle.checked = false;
            localStorage.removeItem('hasGrid');
        } else {
            gridToggleTarget.classList.add('has-grid');
            gridToggle.checked = true;
            localStorage.setItem('hasGrid', true);
        }
    }); 
}