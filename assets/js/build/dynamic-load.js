/**
 * Dynamic Load Stylesheet or Script
 *
 * To dynamically load a stylesheet or script...
 *
 * Note: I think the scripts and styles should be loaded on load.
 */

var dynamicLoad = (function() {

    var props   = {}; // Store properties
    var methods = {}; // Store methods (functions)

    /**
	 * Set path to scripts and stylesheets
	 *
	 * @param path  string relative url path
	 */
    methods.setPath = function (path) {
    	props.path = path;

    	// Trailingslash..
    	// if (url.substr(-1) != '/') url += '/';
    }


    /**
	 * Load the specified Script
	 *
	 * @param url  	  target Script to load
	 * @param loaded  function to call on script loaded
	 */
    methods.script = function (url, loaded) {

		var path = (props.path) ? props.path : '';
		var tag = document.createElement("script");

		if (typeof loaded == "function") {
			tag.onload = loaded;
		}
		tag.src = path + url;
		document.head.appendChild(tag);
	};

	/**
	 * Load the specified Stylesheet
	 *
	 * @param url  	  target Stylesheet to load
	 * @param loaded  function to call on script loaded
	 */
	methods.stylesheet = function (url, loaded) {

		var path = (props.path) ? props.path : '';
		var tag  = document.createElement("link");

		if (typeof loaded == "function") {
			tag.onload = loaded;
		}
		tag.rel = "stylesheet";
		tag.media = "all";
		tag.href = path + url;
		document.head.appendChild(tag);
	};

	/**
	 * Load the specified Stylesheet
	 *
	 * @param url  	  target Stylesheet to load
	 * @param loaded  function to call on script loaded
	 */
	methods.unloadStylesheet = function (id) {

		var stylesheet = document.getElementById(id);

		console.log(stylesheet);

		if (stylesheet) {
			stylesheet.disabled = true;
		}
	};

	// Return
    return {
        setPath: methods.setPath,
        script: methods.script,
        stylesheet: methods.stylesheet,
        unloadStylesheet: methods.unloadStylesheet
    };
})();

export default dynamicLoad;
